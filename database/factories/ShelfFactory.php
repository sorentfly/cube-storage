<?php

namespace Database\Factories;

use App\Models\Shelf;
use App\Models\Rack;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShelfFactory extends Factory
{
    protected $model = Shelf::class;

    public function definition()
    {
        return [
        	'rack_id' => Rack::factory()->create()->id,
            'title' => $this->faker->unique()->sentence(),
        ];
    }
}
