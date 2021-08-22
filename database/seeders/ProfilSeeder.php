<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profil;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profil::create([
            "name" => "offre",
            "display_name" => "offreur d'emplois"
        ]);

        Profil::create([
            "name" => "damande",
            "display_name" => "demandeur d'emplois"
        ]);
    }
}
