<?php

namespace Database\Factories;

use App\Models\Demande;
use Illuminate\Database\Eloquent\Factories\Factory;

class DemandeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Demande::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "job_id" => 1,
            "lieu_cible" => $this->faker->city(),
            "langue" => $this->faker->languageCode(),
            "sexe" => $this->faker->title(),
            "experience" => $this->faker->sentence(15),
            "motivation" => $this->faker->sentence(15),
            "salaire" => $this->faker->randomNumber(3),
            "type_salaire" => "mois",
            "heure_de_travail_par_jours" => "10h",
            "status" => "disponible"
        ];
    }
}
