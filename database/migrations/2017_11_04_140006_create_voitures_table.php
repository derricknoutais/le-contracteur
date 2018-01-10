<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('immatriculation');
            $table->string('marque');
            $table->string('type');
            $table->integer('prix');
            $table->date('date_expiration_assurance')->nullable();
            $table->date('date_expiration_carte_grise')->nullable();
            $table->date('date_expiration_visite_technique')->nullable();
            $table->date('date_expiration_carte_extincteur')->nullable();
            $table->longText('etat_voiture')->nullable();
            //$table->boolean('accessoires')->default(1);
            $table->boolean('pneu_secours')->nullable();
            $table->boolean('crick')->nullable();
            $table->boolean('boite_pharmacie')->nullable();
            $table->boolean('triangle')->nullable();
            $table->boolean('calle_metallique')->nullable();
            $table->boolean('cle_roue')->nullable();
            $table->boolean('gilet')->nullable();
            $table->boolean('baladeuse')->nullable();
            $table->boolean('disponibilite')->default(1);
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
        Schema::dropIfExists('voitures');
    }
}
