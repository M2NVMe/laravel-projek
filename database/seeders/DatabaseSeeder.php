<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // DI INGAT: HARUS SESUAI DENGAN URUTANNYA, KLO ENGGA NANTI BAKAL ERROR DUAR JEBLUG MODARRRR
        \App\Models\Department::factory(5)->create();

        $gradeCount = 35;
        $createdGrades = 0;

        while ($createdGrades < $gradeCount) {
            try {
                \App\Models\Grade::factory()->create();
                $createdGrades++;
            } catch (\Illuminate\Database\QueryException $e) {
                if ($e->errorInfo[1] === 1062) {
                    DB::statement('ALTER TABLE grades AUTO_INCREMENT = ' . ($createdGrades + 1));
                    continue;
                } else {
                    throw $e;
                }
            }
        }

        \App\Models\Student::factory(100)->create();




        // $deptcount = 5;
        // $deptcreated = 0;

        // while ($deptcreated < $deptcount) {
        //     try {
        //         \App\Models\Department::factory()->create();
        //         $deptcreated++;
        //     } catch (\Illuminate\Database\QueryException $e) {
        //         if ($e->errorInfo[1] == 1062) {
        //             DB::statement('ALTER TABLE departments AUTO_INCREMENT = '. ($deptcreated + 1));
        //             continue;
        //         } else {
        //             throw $e;
        //         }
        //     }
        // }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
