<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Trip;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Générer 10 utilisateurs
        User::factory(20)->create();

        $users = User::all();
        foreach ($users as $user) {
            // eager load the profile relationship
            Profile::factory()->for($user)->create();
        }

        Trip::factory(30)->create();
    }
}
