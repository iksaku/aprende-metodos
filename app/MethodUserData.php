<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\MethodUserData
 *
 * @property int $method_id
 * @property int $user_id
 * @property int $attempt
 * @property int|null $time
 * @property-read bool $completed
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUserData isCompleted()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUserData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUserData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUserData query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUserData whereAttempt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUserData whereMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUserData whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUserData whereUserId($value)
 * @mixin \Eloquent
 */
class MethodUserData extends Pivot
{
    public $timestamps = false;

    public $table = 'method_user';

    protected $fillable = [
        'attempt', 'time',
    ];

    protected $casts = [
        'attempt' => 'integer',
        'time' => 'integer',
    ];

    public function scopeIsCompleted(Builder $query)
    {
        $query->whereNotNull('time');
    }

    public function getCompletedAttribute(): bool
    {
        return $this->time !== null;
    }
}
