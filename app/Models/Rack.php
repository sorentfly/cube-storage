<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\RackFactory;

class Rack extends Model
{
    use HasFactory;

    protected $factory = RackFactory::class;
    
    protected $fillable = ['title'];

    public $timestamps = false;
    
    public function shelves(): HasMany
    {
        return $this->hasMany(Shelf::class);
    }
}
