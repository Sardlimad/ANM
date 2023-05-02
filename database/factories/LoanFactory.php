<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_student' => $this ->faker -> randomDigit(),
            'id_academy' => $this ->faker -> randomDigit(),
            'id_article' => $this ->faker -> randomDigit(),
        ];
    }
}
