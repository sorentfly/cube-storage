<?php

namespace Database\Factories;

use App\Models\Box;
use App\Models\Shelf;
use App\Models\Cube;
use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class CubeFactory extends Factory
{
    protected $model = Cube::class;

    public function definition()
    {
        return [
        	'box_id' => Box::factory()->create()->id,
            'color_id' => Color::factory()->create()->id,
        ];
    }
}
