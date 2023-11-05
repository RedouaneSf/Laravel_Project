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
        Schema::create('cars', function (Blueprint $table) {
            $table->id('idCar');
            $table->string('carname');
            $table->string('marque');
            $table->string('model');
            $table->integer('nplace');
            $table->integer('nporte');
            $table->string('Carburant');
            $table->string('image');
            $table->integer('isDisponible')->default(1);
            $table->longText('description');
            $table->string('slug');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('categorie_id');
            
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
