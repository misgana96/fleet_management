<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if (Schema::hasTable('service')) {
            schema::drop('service');
        }
 Schema::create('services', function (Blueprint $table) {

         
            $table->increments('service_id');    
            $table->string('vehicle')->nullable(); 
            $table->string('vin')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('plate')->nullable();
            $table->double('odometer')->nullable();
            $table->double('parts')->nullable();
            $table->double('labor')->nullable();
            $table->double('labago')->nullable();
            $table->double('fuel')->nullable();
            $table->double('tire')->nullable();
            $table->double('tire_infl')->nullable();
            $table->double('total')->nullable();
            $table->string('attached_file')->nullable();
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
