<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Method.
 *
 * @property int $id
 * @property int $topic_id
 * @property string $slug
 * @property string $name
 * @property string $content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Exercise[] $exercises
 * @property-read int|null $exercises_count
 * @property-read Topic $topic
 * @method static Builder|Method newModelQuery()
 * @method static Builder|Method newQuery()
 * @method static Builder|Method query()
 * @method static Builder|Method whereContent($value)
 * @method static Builder|Method whereCreatedAt($value)
 * @method static Builder|Method whereId($value)
 * @method static Builder|Method whereName($value)
 * @method static Builder|Method whereSlug($value)
 * @method static Builder|Method whereTopicId($value)
 * @method static Builder|Method whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Method extends Model
{
    /** @var bool */
    public $timestamps = false;

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
        return $this->hasMany(Exercise::class);
    }

    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->using(MethodUser::class)
            ->withPivot([
                'attempt',
                'completed',
            ]);
    }
}
