<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\ColorFactory;

class Color extends Model
{
	use HasFactory;

    protected $factory = ColorFactory::class;
    
    protected $fillable = ['title'];

    public $timestamps = false;
	
    public function boxes(): HasMany
    {
        return $this->hasMany(Box::class);
    }
}
