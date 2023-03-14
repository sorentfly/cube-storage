<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\ShelfFactory;

/**
 * @property int    $id
 * @property string $title
 * @property int    $rack_id
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
