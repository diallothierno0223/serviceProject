<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastName')->nullable();
            $table->string('dateNaissance')->nullable();
            $table->string('sexe')->nullable()->nullable();
            $table->string('email')->unique();
            $table->string('numero')->nullable();
            $table->string('numeroPieceIdentiter')->nullable();
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->string('rue')->nullable();
            $table->unsignedBigInteger('profil_id')->default(1);
            $table->foreign('profil_id')->references('id')->on('profils');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
