<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Exercises.
 *
 * @property int $id
 * @property int $method_id
 * @property string $content
 * @property string $answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Method $subtopic
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercises newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercises newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercises query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercises whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercises whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercises whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercises whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercises whereMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exercises whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Exercises extends Model
{
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
