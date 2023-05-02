<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'category' => $this ->faker->randomElement(['Instrumento','Libro','Artículo']),
                'type' => $this ->faker->word(),
                'brand' => $this ->faker->word(),
                'model' => $this ->faker->word(),
                'serial' => $this ->faker->randomDigit(),
                'description' => $this ->faker->sentence(),
                'status' => $this ->faker->randomElement(['Bueno','Regular','Malo']),
                'available' => $this ->faker->boolean(),
        ];
    }
}
