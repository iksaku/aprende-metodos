<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Method
 *
 * @property int $id
 * @property int $topic_id
 * @property string $slug
 * @property string $name
 * @property string $content
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Exercise[] $exercises
 * @property-read int|null $exercises_count
 * @property-read \App\Topic $topic
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Method whereTopicId($value)
 * @mixin \Eloquent
 */
class Method extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'slug', 'name', 'content',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class);
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(MethodUserData::class)
            ->withPivot([
                'attempt',
                'time',
            ]);
    }
}
