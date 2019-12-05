<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('driver_vehicle', function (Blueprint $table) {
            $table->increments('dv_id');
            $table->string('vehicle_id')->nullable();    
            $table->string('driver_id')->nullable(); 
            $table->date('assigned_date')->nullable();
            $table->date('unassigned_date')->nullable();
            $table->string('status')->nullable();
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
        //
    }
}
