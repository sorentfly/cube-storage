<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\BoxFactory;

/**
 * @mixin Builder
 *
 * @method static Builder|static query()
 * @method static static make(array $attributes = [])
 * @method static static create(array $attributes = [])
 * @method static static forceCreate(array $attributes)
 * @method Box firstOrNew(array $attributes = [], array $values = [])
 * @method Box firstOrFail($columns = ['*'])
 * @method Box firstOrCreate(array $attributes, array $values = [])
 * @method Box firstOr($columns = ['*'], \Closure $callback = null)
 * @method Box firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method Box updateOrCreate(array $attributes, array $values = [])
 * @method null|static first($columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static findOrNew($id, $columns = ['*'])
 * @method static null|static find($id, $columns = ['*'])
 *
 * @property-read int    $id
 *
 * @property string $title
 * @property int    $shelf_id
 *
 * @property-read Collection|Cube[] $cubes
 * @property-read Shelf $shelf
 */
class Box extends Model
{
    use HasFactory;

    protected string $factory = BoxFactory::class;

    protected $fillable = ['title', 'shelf_id'];

    public $timestamps = false;

    /**
     * Отношение к Кубикам
     *
     * @return HasMany
     */
    public function cubes(): HasMany
    {
        return $this->hasMany(Cube::class);
    }

    /**
     * Отношение к Полке
     *
     * @return BelongsTo
     */
    public function shelf(): BelongsTo
    {
        return $this->belongsTo(Shelf::class);
    }
}
