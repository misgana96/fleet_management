<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReminderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    schema::create('reminders', function (Blueprint $table){
            $table->increments('reminder_id');
            $table->string('vehicle_name')->nullable();
            $table->string('users')->nullable(); 
           // $table->string('issue')->nullable();
            $table->string('issue_id')->nullable();
            $table->date('due_date')->nullable();
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
