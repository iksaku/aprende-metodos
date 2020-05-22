<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Helpers\AnswerPipeline;
use App\Http\Middleware\ExerciseTimingMiddleware;
use App\Method;
use App\MethodUserData;
use App\Rules\AnswerRule;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MethodController extends Controller
{
    public function __construct()
    {
        $this->middleware(ExerciseTimingMiddleware::class)
            ->only(['showExercise', 'checkExercise']);
    }

    public function showMethod(Method $method)
    {
        return view('app.method', [
            'method' => $method,
            'time' => $method->users()->find(Auth::user())->first()->pivot->time ?? null
        ]);
    }

    public function showExercise(Method $method)
    {
        $user = Auth::user();

        $method->users()->syncWithoutDetaching($user);

        /** @var MethodUserData $pivot */
        $pivot = $method->users()->find($user)->first()->pivot;

        if ($pivot->completed) {
            return redirect()->route('method', $method);
        }

        if (empty(session()->get('started_at'))) {
            $pivot->update(['attempt' => ++$pivot->attempt]);

            session()->flash('started_at', now()->getTimestamp());
            session()->flash('closes_at', now()->addMinutes(15)->getTimestamp());
        }

        $closes_at = session()->get('closes_at');

        $exercise = $method->exercises->get($pivot->attempt % $method->exercises->count());

        return view('app.exercise', compact('method', 'exercise', 'closes_at'));
    }

    public function checkExercise(Request $request, Method $method)
    {
        $closes_at = session()->get('closes_at');
        if (empty($closes_at) || now()->isAfter(Carbon::createFromTimestamp($closes_at))) {
            abort(419);
        }

        $data = $request->validate([
            'answer' => ['required', new AnswerRule()]
        ]);

        $user = Auth::user();

        /** @var MethodUserData $pivot */
        $pivot = $method->users()->find($user)->first()->pivot ?? null;

        if (empty($pivot)) {
            return redirect()->route('method', $method);
        }

        /** @var Exercise $exercise */
        $exercise = $method->exercises->get($pivot->attempt % $method->exercises->count());

        if (AnswerPipeline::isCorrect($exercise, $data['answer'])) {
            $started_at = Carbon::createFromTimestamp(session()->get('started_at'));

            $pivot->update([
                'time' => $started_at->diffInSeconds(now())
            ]);

            return redirect()->route('method', compact('method'));
        }

        session()->forget('ttl');

        session()->flash('alert', 'La respuesta no es correcta, porfavor lee nuevamente el capítulo e intentalo de nuevo.');

        return redirect()->route('method', compact('method'));
    }
}
