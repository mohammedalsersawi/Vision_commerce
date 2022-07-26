<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word(3,true);
        return [
            'name' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraph(3,true),
            'image' => $this->faker->imageUrl(),
            'category_id' => $this->faker->numberBetween(1,20),

        ];
    }
}
