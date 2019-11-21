<?php

namespace App\Http\Controllers;

use App\Method;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MethodController extends Controller
{
    public function showMethod(Method $method)
    {
        $pivot = $this->getPivotData(Auth::user(), $method);

        $completed = $pivot->completed ?? false;

        $alert = session()->get('alert');

        return view('app.method', compact('method', 'completed', 'alert'));
    }

    public function showExercise(Method $method)
    {
        // Get current logged user
        $user = Auth::user();

        // Ensure the user is only related once
        $method->users()->syncWithoutDetaching($user);

        // Fetch pivot data for current Method-User relationship
        $pivot = $this->getPivotData($user, $method);

        if ($pivot->completed) {
            return redirect()->route('method', $method);
        }

        // Increase current attempt
        if (empty(session()->get('ttl'))) {
            $pivot->update(['attempt' => $pivot->attempt + 1]);
        }

        // Fetch all exercises for current method
        $exercises = $method->exercises;

        // Gets the exercise based on the current attempt
        $exercise = $exercises->get($pivot->attempt % $exercises->count());

        // Creates a validation TTL token
        $ttlToken = session()->get('ttl', now()->addMinutes(15)->getTimestamp());

        // Return exercise view along with exercise data and ttlToken
        return view('app.exercise', compact('method', 'exercise', 'ttlToken'));
    }

    public function checkExercise(Request $request, Method $method)
    {
        $ttl = $request->get('ttl');
        // Abort if no ttlToken
        if (empty($ttl) || now()->getTimestamp() > $ttl) {
            abort(419);
        }

        session()->flash('ttl', $ttl);

        $validatedData = $request->validate([
            'answer' => 'required|numeric',
        ]);

        $answer = floor((float) $validatedData['answer'] * 10000) / 10000;

        $user = Auth::user();

        $pivot = $this->getPivotData($user, $method);
        $exercises = $method->exercises;
        $exercise = $exercises->get($pivot->attempt % $exercises->count());

        if ($exercise->answer === $answer) {
            $pivot->update(['completed' => true]);

            return redirect()->route('method', compact('method'));
        } else {
            session()->forget('ttl');
            session()->flash('alert', 'La respuesta no es correcta, porfavor lee nuevamente el capítulo e intentalo denuevo.');

            return redirect()->route('method', compact('method'));
        }
    }

    private function getPivotData(User $user, Method $method)
    {
        return $method->users()->whereId($user->id)->first()->pivot ?? null;
    }
}
