<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('vehicles', function (Blueprint $table) {
            $table->increments('vehicle_id');
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_name',50)->unique();
            $table->string('vehicle_image')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->date('manufacture_year');
            $table->string('vin')->nullable();
            $table->string('engine')->uniqid()->nullable();
            $table->string('plate')->uniqid()->nullable();
            $table->string('fuel_type')->nullable();
            $table->double('fuel_tank')->nullable();
            $table->string('primary_meter')->nullable();
            $table->string('secondary_meter')->nullable();
            $table->longText('note')->nullable();
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
