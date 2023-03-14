<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\CubeFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $box_id
 * @property int $color_id
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
