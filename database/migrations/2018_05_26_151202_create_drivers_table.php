<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('driver_id');
            $table->string('first_name')->nullable();     
            $table->string('last_name')->nullable(); 
            $table->string('sex')->nullable(); 
            $table->string('birth')->nullable();
            $table->string('email')->nullable();
            $table->double('phone')->default('0.0');
            $table->double('emergency')->nullable();
            $table->double('wage')->default('0.0');
            $table->date('hired_on')->nullable();
            $table->string('photo')->nullable();
            $table->string('note')->nullable();
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
