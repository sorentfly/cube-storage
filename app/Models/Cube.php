<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\CubeFactory;

class Cube extends Model
{
    use HasFactory;

    protected $factory = CubeFactory::class;

    protected $fillable = ['box_id', 'color_id'];

    public $timestamps = false;
    
    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
