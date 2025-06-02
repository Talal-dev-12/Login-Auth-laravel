<?php

namespace Database\Factories;

use App\Models\course;
use App\Models\department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $code = 231000;
        return [
            'rollno' => 'CSD' . $code++,
            'name' => fake()->name(),
            'DEPT_ID' => department::factory(),
            'C_ID' => course::factory()
        ];
    }
}
