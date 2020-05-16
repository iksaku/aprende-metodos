<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Exercise.
 *
 * @property int $id
 * @property int $method_id
 * @property string $content
 * @property string $answer
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Method $subtopic
 * @method static Builder|Exercise newModelQuery()
 * @method static Builder|Exercise newQuery()
 * @method static Builder|Exercise query()
 * @method static Builder|Exercise whereAnswer($value)
 * @method static Builder|Exercise whereContent($value)
 * @method static Builder|Exercise whereCreatedAt($value)
 * @method static Builder|Exercise whereId($value)
 * @method static Builder|Exercise whereMethodId($value)
 * @method static Builder|Exercise whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Exercise extends Model
{
    /** @var bool */
    public $timestamps = false;

    /** @var array */
    protected $fillable = [
        'content', 'answer',
    ];

    /**
     * @return BelongsTo
     */
    public function subtopic()
    {
        return $this->belongsTo(Method::class);
    }
}
