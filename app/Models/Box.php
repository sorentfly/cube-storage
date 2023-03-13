<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\BoxFactory;

class Box extends Model
{
    use HasFactory;

    protected $factory = BoxFactory::class;

    protected $fillable = ['title'];

    public $timestamps = false;
    
    public function cubes(): HasMany
    {
        return $this->hasMany(Cube::class);
    }
    
    public function shelf()
    {
        return $this->belongsTo(Shelf::class);
    }
}
