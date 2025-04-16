<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile; // Ajout de l'import pour le modèle Profile
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Générer 10 utilisateurs fictifs
        User::factory(10)->create();

        // Générer 20 profils fictifs
        Profile::factory(20)->create();

    }
}
