<?php

namespace Database\Factories;

use App\Models\Rack;
use Illuminate\Database\Eloquent\Factories\Factory;

class RackFactory extends Factory
{
    protected $model = Rack::class;

    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence(),
        ];
    }
}
