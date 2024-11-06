<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    protected $model = Department::class;

    private static $names = ['PPLG', 'DKV', 'TG', 'ANIM 3D', 'ANIM 2D'];
    private static $descriptions = ['pusing mania', 'basically anim 2d but without the cool stuff', 'rpl but machinery', 'animation with blender', 'animation with krita'];
    private static $index = 0;

    public function definition()
    {
        $name = self::$names[self::$index];
        $desctiption = self::$descriptions[self::$index];
        self::$index = (self::$index + 1) % count(self::$names);

        return [
            'name' => $name,
            'description' => $desctiption
        ];
    }
}
