<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Demande;
use App\Models\Offre;
use Database\Seeders\JobSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\ProfilSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ProfilSeeder::class);
        $this->call(JobSeeder::class);
        User::factory(10)->has(Demande::factory()->count(10))->create();
        User::factory(10)->has(Offre::factory()->count(10))->create();
    }
}
