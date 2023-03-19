<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bordereaus', function (Blueprint $table) {
            $table->id();
            $table->string("Num_courie");
            $table->string("emetteur");
            $table->dateTime("date_envoi");
            $table->string("envoye_a");
            $table->string("objet");
            $table->string("type");
            $table->string("tranfere_a");
            $table->dateTime("date_transfert");
            $table->boolean("obligation_repanse");
            $table->dateTime("date_reponse");
            $table->string("fichier");
            $table->bigInteger("id_user")->unsigned();
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
        Schema::dropIfExists('bordereaus');
    }
};
