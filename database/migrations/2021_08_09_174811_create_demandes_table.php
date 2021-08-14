<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references('id')->on("users");

            $table->unsignedBigInteger("job_id");
            $table->foreign("job_id")->references("id")->on("jobs");

            $table->string("lieu_cible");
            $table->string("langue");
            $table->string("sexe");
            $table->longText("experience");
            $table->longText("motivation");
            $table->string("salaire");
            $table->string("type_salaire");
            $table->string("heure_de_travail_par_jours");
            $table->string("status")->default('disponible');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandes');
    }
}
