<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($teacher) {
            Teacher::factory()->create([
                'user_id' => $teacher->id,
            ]);
        });
    }
}
