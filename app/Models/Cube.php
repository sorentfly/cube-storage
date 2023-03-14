<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\CubeFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin Builder
 *
 * @method static Builder|static query()
 * @method static static make(array $attributes = [])
 * @method static static create(array $attributes = [])
 * @method static static forceCreate(array $attributes)
 * @method Cube firstOrNew(array $attributes = [], array $values = [])
 * @method Cube firstOrFail($columns = ['*'])
 * @method Cube firstOrCreate(array $attributes, array $values = [])
 * @method Cube firstOr($columns = ['*'], \Closure $callback = null)
 * @method Cube firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method Cube updateOrCreate(array $attributes, array $values = [])
 * @method null|static first($columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static findOrNew($id, $columns = ['*'])
 * @method static null|static find($id, $columns = ['*'])
 *
 * @property-read int $id
 *
 * @property int $box_id
 * @property int $color_id
 *
 * @property-read Box $box
 * @property-read Color $color
 */
class Cube extends Model
{
    use HasFactory;

    protected string $factory = CubeFactory::class;

    protected $fillable = ['box_id', 'color_id'];

    public $timestamps = false;

    /**
     * Отношение к Коробке
     *
     * @return BelongsTo
     */
    public function box(): BelongsTo
    {
        return $this->belongsTo(Box::class);
    }

    /**
     * Отношение к Цвету
     *
     * @return BelongsTo
     */
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
}
