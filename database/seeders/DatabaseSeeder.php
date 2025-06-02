<?php

namespace Database\Seeders;

use App\Models\Category;
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
        //admin user

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'type' => 1,
        ]);

        // create category Dogs, Cats, Birds, Fish
        Category::create(['name' => 'Dogs']);
        Category::create(['name' => 'Cats']);
        Category::create(['name' => 'Birds']);
        Category::create(['name' => 'Fish']);
    }
}
