<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Department;
use App\Models\Grade;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        $grade = Grade::inRandomOrder()->first();

        if (!$grade) {
            throw new \Exception("shit went wrong!");
        } else {
            return [
                'name' => $this->faker->name(),
                'grade_id' => $grade->id,
                'department_id' => $grade->department_id,
                'email' => $this->faker->unique()->safeEmail(),
                'address' => $this->faker->address(),
            ];
        }
    }
}

