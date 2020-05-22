<?php

namespace App\Http\Livewire\Method;

use App\Method;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * Class Ranking
 * @package App\Http\Livewire\Method
 *
 * @property-read Collection $topRankers
 * @property-read Collection $ranking
 * @property-read bool $isUserRanked
 * @property-read string $userTime
 */
class Ranking extends Component
{
    /** @var Method */
    public $method;

    public function mount(Method $method)
    {
        $this->method = $method;
    }

    public function getTopRankersProperty()
    {
        return $this->method->users()
            ->wherePivot('time', '!=', null)
            ->orderBy('method_user.time')
            ->limit(10)
            ->get();
    }

    public function getRankingProperty()
    {
        return $this->topRankers
            ->map(function (User $user) {
                return [
                    'user' => $user,
                    'time' => $this->calculateTime($user->pivot->time)
                ];
            });
    }

    public function getIsUserRankedProperty()
    {
        return $this->topRankers->contains(Auth::user());
    }

    public function getUserTimeProperty()
    {
        if ($this->isUserRanked) {
            return null;
        }

        $time = $this->method->users()->find(Auth::user())->first()->pivot->time ?? null;

        if ($time === null) {
            return null;
        }

        return $this->calculateTime($time);
    }

    protected function calculateTime(int $seconds)
    {
        $base = now();
        $finalTime = $base->copy()->addSeconds($seconds);

        $format = '%s segundos';
        if ($seconds >= 60) {
            $format = '%i minutos, ' . $format;
        }

        return $base->diff($finalTime)->format($format);
    }

    public function render()
    {
        return view('livewire.method.ranking');
    }
}
