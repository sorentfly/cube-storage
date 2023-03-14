<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\RackFactory;

/**
 * @mixin Builder
 *
 * @method static Builder|static query()
 * @method static static make(array $attributes = [])
 * @method static static create(array $attributes = [])
 * @method static static forceCreate(array $attributes)
 * @method Rack firstOrNew(array $attributes = [], array $values = [])
 * @method Rack firstOrFail($columns = ['*'])
 * @method Rack firstOrCreate(array $attributes, array $values = [])
 * @method Rack firstOr($columns = ['*'], \Closure $callback = null)
 * @method Rack firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method Rack updateOrCreate(array $attributes, array $values = [])
 * @method null|static first($columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static findOrNew($id, $columns = ['*'])
 * @method static null|static find($id, $columns = ['*'])
 *
 * @property-read int    $id
 *
 * @property string $title
 *
 * @property-read Collection|Shelf[] $shelves
 */
class Rack extends Model
{
    use HasFactory;

    protected string $factory = RackFactory::class;

    protected $fillable = ['title'];

    public $timestamps = false;

    /**
     * Отношние к Полкам
     *
     * @return HasMany
     */
    public function shelves(): HasMany
    {
        return $this->hasMany(Shelf::class);
    }
}
