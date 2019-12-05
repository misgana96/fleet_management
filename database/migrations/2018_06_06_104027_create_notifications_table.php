<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary()->nullable();
            $table->string('type')->nullable();
            $table->string('plate')->nullable();
            $table->double('notifiable_id')->nullable();
            $table->string('notifiable_type')->nullable();
            $table->text('data')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->string('status')->default('no');
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
        Schema::dropIfExists('notifications');
    }
}
