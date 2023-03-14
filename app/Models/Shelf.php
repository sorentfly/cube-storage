<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\ShelfFactory;

/**
 * @mixin Builder
 *
 * @method static Builder|static query()
 * @method static static make(array $attributes = [])
 * @method static static create(array $attributes = [])
 * @method static static forceCreate(array $attributes)
 * @method Shelf firstOrNew(array $attributes = [], array $values = [])
 * @method Shelf firstOrFail($columns = ['*'])
 * @method Shelf firstOrCreate(array $attributes, array $values = [])
 * @method Shelf firstOr($columns = ['*'], \Closure $callback = null)
 * @method Shelf firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method Shelf updateOrCreate(array $attributes, array $values = [])
 * @method null|static first($columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static findOrNew($id, $columns = ['*'])
 * @method static null|static find($id, $columns = ['*'])
 *
 * @property-read int    $id
 *
 * @property string $title
 * @property int    $rack_id
 *
 * @property-read Collection|Box[] $boxes
 * @property-read Rack $rack
 */
class Shelf extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'rack_id'];

    protected string $factory = ShelfFactory::class;

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

    /**
     * Отношение к Стелажу
     *
     * @return BelongsTo
     */
    public function rack(): BelongsTo
    {
        return $this->belongsTo(Rack::class);
    }
}
