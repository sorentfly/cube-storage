<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\ShelfFactory;

class Shelf extends Model
{
    use HasFactory;
    
    protected $fillable = ['title'];

    protected $factory = ShelfFactory::class;

    public $timestamps = false;
    
    public function boxes(): HasMany
    {
        return $this->hasMany(Box::class);
    }

    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }
}
