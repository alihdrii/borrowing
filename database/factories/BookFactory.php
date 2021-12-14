<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->name(),
            'published_at' => now(),
            'rate' => $this->faker->name(),  
            'isbn' => Str::random(5),
              ];
    }
}
