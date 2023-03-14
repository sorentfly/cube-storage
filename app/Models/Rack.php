<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\RackFactory;

/**
 * @property int    $id
 * @property string $title
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
