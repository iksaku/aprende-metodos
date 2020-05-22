<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Topic
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Method[] $methods
 * @property-read int|null $methods_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereName($value)
 * @mixin \Eloquent
 */
class Topic extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    protected $with = [
        'methods'
    ];

    public function methods(): HasMany
    {
        return $this->hasMany(Method::class);
    }
}
