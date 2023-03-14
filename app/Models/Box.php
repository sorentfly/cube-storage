<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\BoxFactory;

/**
 * @property int    $id
 * @property string $title
 * @property int    $shelf_id
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
