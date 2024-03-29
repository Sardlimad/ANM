<?php

namespace Database\Factories;

use App\Models\Academy;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>$this -> faker ->name(),
            'phone' =>$this -> faker ->phoneNumber(),
            'gender' =>$this -> faker ->randomElement(['Masculino','Femenino']),
            'birthday' =>$this -> faker ->date('Y-m-d','now'),
            'type' =>$this -> faker ->randomElement(['Alumno','Autodidacta']),
            'academy_id' => rand(1,10),

        ];
    }
}
