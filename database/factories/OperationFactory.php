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
            'student_id' => rand(1,50),
            'article_id' => rand(1,100),
            'user_id' => rand(1,5),
            'active' => $this ->faker -> boolean(),
        ];
    }
}
