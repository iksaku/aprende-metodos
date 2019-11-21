<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\MethodUser.
 *
 * @property int $method_id
 * @property int $user_id
 * @property int $attempt
 * @property bool $completed
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUser isCompleted()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUser whereAttempt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUser whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUser whereMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MethodUser whereUserId($value)
 * @mixin \Eloquent
 */
class MethodUser extends Pivot
{
    /** @var array */
    protected $fillable = [
        'attempt', 'completed',
    ];

    /** @var array */
    protected $casts = [
        'attempt' => 'integer',
        'completed' => 'boolean',
    ];

    public function scopeIsCompleted($query)
    {
        $query->where('completed', true);
    }
}
