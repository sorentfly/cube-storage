<?php

namespace Database\Factories;

use App\Models\Box;
use App\Models\Shelf;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoxFactory extends Factory
{
    protected $model = Box::class;

    public function definition()
    {
        return [
        	'shelf_id' => Shelf::factory()->create()->id,
            'title' => $this->faker->unique()->sentence(),
        ];
    }
}
