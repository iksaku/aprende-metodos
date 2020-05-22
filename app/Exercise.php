<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Exercise
 *
 * @property int $id
 * @property int $method_id
 * @property string $content
 * @property string $answer
 * @property-read \App\Method $subtopic
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercise whereMethodId($value)
 * @mixin \Eloquent
 */
class Exercise extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'content', 'answer',
    ];

    public function subtopic(): BelongsTo
    {
        return $this->belongsTo(Method::class);
    }
}
