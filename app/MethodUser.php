<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\MethodUser.
 *
 * @property int $method_id
 * @property int $user_id
 * @property int $attempt
 * @property bool $completed
 * @method static Builder|MethodUser isCompleted()
 * @method static Builder|MethodUser newModelQuery()
 * @method static Builder|MethodUser newQuery()
 * @method static Builder|MethodUser query()
 * @method static Builder|MethodUser whereAttempt($value)
 * @method static Builder|MethodUser whereCompleted($value)
 * @method static Builder|MethodUser whereMethodId($value)
 * @method static Builder|MethodUser whereUserId($value)
 * @mixin Eloquent
 */
class MethodUser extends Pivot
{
    /** @var bool */
    public $timestamps = false;

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
