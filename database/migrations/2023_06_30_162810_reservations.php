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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('isAccepted')->default(0);
            $table->date('date_e');
            $table->date('date_s');
            $table->float('montant');
            $table->string('heure_recup');
            $table->string('heure_remise');
            $table->integer('client_id');
            $table->integer('car_id');
            $table->integer('extra_id');
            $table->integer('pay_id');

            
            
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
        Schema::dropIfExists('reservations');
    }
};
