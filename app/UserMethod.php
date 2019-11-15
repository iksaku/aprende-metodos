<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\UserMethod.
 *
 * @property int $user_id
 * @property int $method_id
 * @property int $attempt
 * @property bool $completed
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMethod whereAttempt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMethod whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMethod whereMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMethod whereUserId($value)
 * @mixin \Eloquent
 */
class UserMethod extends Pivot
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
}
