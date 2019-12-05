<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
 Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name')->nullable();    
            $table->string('jour_name')->nullable(); 
            $table->date('serv_location')->nullable();
            $table->date('serv_case')->nullable();
            $table->string('serv_sent_time')->nullable();
            $table->string('serv_exp_time')->nullable();
            $table->string('serv_id')->nullable();
            $table->string('serv_length')->nullable();
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
