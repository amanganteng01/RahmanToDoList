<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'User1',
            'username' => 'user123',
            'password'=> bcrypt('123'),
        ]);

        User::create([
            'name' => 'User2',
            'username' => 'user1234',
            'password'=> bcrypt('1234'),
        ]);

        Task::create([
            'users_id' => 1,
            'title' => 'Tugas 1',
            'description' => 'Deskripsi tugas 1',
            'is_completed' => 1,
            'completed_at' => '2025-08-18',
        ]);

        Task::create([
            'users_id' => 2,
            'title' => 'Tugas 2',
            'description' => 'Deskripsi tugas 2',
            'is_completed' => 1,
            'completed_at' => 'Not Finished Yet',
        ]);
    }
}
