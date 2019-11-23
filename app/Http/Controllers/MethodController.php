<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Helpers\AnswerPipeline;
use App\Method;
use App\MethodUser;
use App\Rules\AnswerRule;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MethodController extends Controller
{
    public function showMethod(Method $method)
    {
        $user = Auth::user();

        /*$prev = Method::whereId($method->id - 1)->first();

        if ($prev !== null) {
            $prevData = $this->getPivotData($user, $prev);

            if (empty($prevData) || !$prevData->completed) {
                session()->flash('alert', 'Antes de avanzar a los siguientes métodos, por favor completa el método en curso.');
                return redirect()->route('method', $prev);
            }
        }*/

        $pivot = $this->getPivotData($user, $method);

        $completed = $pivot->completed ?? false;

        $alert = session()->get('alert');

        return view('app.method', compact('method', 'completed', 'alert'));
    }

    public function showExercise(Method $method)
    {
        $user = Auth::user();

        $method->users()->syncWithoutDetaching($user);

        $pivot = $this->getPivotData($user, $method);

        if ($pivot->completed) {
            return redirect()->route('method', $method);
        }

        if (empty(session()->get('ttl'))) {
            $pivot->update(['attempt' => $pivot->attempt + 1]);
        }

        $exercises = $method->exercises;

        $exercise = $exercises->get($pivot->attempt % $exercises->count());

        $ttlToken = session()->get('ttl', now()->addMinutes(15)->getTimestamp());

        return view('app.exercise', compact('method', 'exercise', 'ttlToken'));
    }

    public function checkExercise(Request $request, Method $method)
    {
        $ttl = $request->get('ttl');
        if (empty($ttl) || now()->getTimestamp() > $ttl) abort(419);

        session()->flash('ttl', $ttl);

        $validatedData = $request->validate([
            'answer' => ['required', new AnswerRule()]
        ]);

        $userAnswer = AnswerPipeline::make($validatedData['answer']);

        $user = Auth::user();

        /** @var MethodUser $pivot */
        $pivot = $this->getPivotData($user, $method);
        /** @var Exercise[]|Collection $exercises */
        $exercises = $method->exercises;
        /** @var Exercise $exercise */
        $exercise = $exercises->get($pivot->attempt % $exercises->count());

        if (AnswerPipeline::make($exercise->answer) === $userAnswer) {
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
