<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance')->nullable();
            $table->string('addresse')->nullable();
            $table->string('ville');
            $table->smallInteger('type');
            $table->string('numero_permis')->nullable();
            $table->string('numero_phone')->unique()->nullable();
            $table->string('numero_phone2')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('balance')->nullable();
            $table->integer('caution')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
