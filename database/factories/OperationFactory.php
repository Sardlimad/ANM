<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OperationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_student' => rand(1,50),
            'id_article' => rand(1,100),
            'id_user' => rand(1,50),
            'operation' => $this ->faker -> randomElement(['Préstamo','Devolución','Registro']),
        ];
    }
}
