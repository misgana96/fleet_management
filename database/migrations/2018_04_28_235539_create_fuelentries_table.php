<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelentriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuelentries', function (Blueprint $table) {
            $table->increments('fuelentry_id');
            $table->string('vehicle')->nullable();    
            $table->string('fuelentry_date')->nullable(); 
            $table->string('meter_start')->nullable();
            $table->double('amount')->default('0.0');
            $table->double('price_unit')->default('0.0');
            $table->string('vendor')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('invoice')->nullable();
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
        Schema::dropIfExists('fuelentries');
    }
}
