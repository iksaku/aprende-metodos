<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Exercise.
 *
 * @property int $id
 * @property int $method_id
 * @property string $content
 * @property string $answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Method $subtopic
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise whereMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Exercise extends Model
{
    /** @var bool */
    public $timestamps = false;

    /** @var array */
    protected $fillable = [
        'content', 'answer',
    ];

    /** @var array */
    protected $casts = [
        'answer' => 'float'
    ];

    /**
     * @return BelongsTo
     */
    public function subtopic()
    {
        return $this->belongsTo(Method::class);
    }
}
