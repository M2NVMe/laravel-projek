<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    // protected $model = Grade::class;

    // private static $names = ['10 Sub 1', '10 Sub 2', '11 Sub 1', '11 Sub 2', '12 Sub 1', '12 Sub 2'];
    // private static $index = 0;



    public function definition()
    {
        // $name = self::$names[self::$index];
        // self::$index = (self::$index + 1) % count(self::$names);

        $department = Department::inRandomOrder()->first();

        return [
            'name' => $this->faker->numberBetween(10, 12) . ' ' . $department->name . ' ' . $this->faker->numberBetween(1, 5),
            'department_id' => $department->id,
        ];
    }
}
