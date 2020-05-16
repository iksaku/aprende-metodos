<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Topic.
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Method[] $methods
 * @property-read int|null $methods_count
 * @method static Builder|Topic newModelQuery()
 * @method static Builder|Topic newQuery()
 * @method static Builder|Topic query()
 * @method static Builder|Topic whereCreatedAt($value)
 * @method static Builder|Topic whereId($value)
 * @method static Builder|Topic whereName($value)
 * @method static Builder|Topic whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Topic extends Model
{
    /** @var bool */
    public $timestamps = false;

    /** @var array */
    protected $fillable = [
        'name',
    ];

    /** @var array */
    protected $with = [
        'methods'
    ];

    /**
     * @return HasMany
     */
    public function methods()
    {
        return $this->hasMany(Method::class);
    }
}
