<?php

namespace Database\Factories;

use Stringable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words(4 , true);
        return [
            'name' => $title,
            'slug' => Str::slug($title),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
