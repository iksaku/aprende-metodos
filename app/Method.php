<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Method.
 *
 * @property int $id
 * @property int $topic_id
 * @property string $slug
 * @property string $name
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Exercises[] $exercises
 * @property-read int|null $exercises_count
 * @property-read \App\Topic $topic
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Method extends Model
{
    /** @var array */
    protected $fillable = [
        'slug', 'name', 'content',
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    /**
     * @return HasMany
     */
    public function exercises()
    {
        return $this->hasMany(Exercises::class);
    }
}
