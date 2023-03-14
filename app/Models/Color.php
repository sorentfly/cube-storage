<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\ColorFactory;

/**
 * @mixin Builder
 *
 * @method static Builder|static query()
 * @method static static make(array $attributes = [])
 * @method static static create(array $attributes = [])
 * @method static static forceCreate(array $attributes)
 * @method Color firstOrNew(array $attributes = [], array $values = [])
 * @method Color firstOrFail($columns = ['*'])
 * @method Color firstOrCreate(array $attributes, array $values = [])
 * @method Color firstOr($columns = ['*'], \Closure $callback = null)
 * @method Color firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method Color updateOrCreate(array $attributes, array $values = [])
 * @method null|static first($columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static findOrNew($id, $columns = ['*'])
 * @method static null|static find($id, $columns = ['*'])
 *
 * @property-read int    $id
 *
 * @property string $title
 *
 * @property-read Collection|Box[] $boxes
 */
class Color extends Model
{
	use HasFactory;

    protected string $factory = ColorFactory::class;

    protected $fillable = ['title'];

    public $timestamps = false;

    /**
     * Отношение к Коробкам
     *
     * @return HasMany
     */
    public function boxes(): HasMany
    {
        return $this->hasMany(Box::class);
    }
}
