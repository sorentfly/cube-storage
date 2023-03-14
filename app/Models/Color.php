<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\ColorFactory;

/**
 * @property int    $id
 * @property string $title
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
