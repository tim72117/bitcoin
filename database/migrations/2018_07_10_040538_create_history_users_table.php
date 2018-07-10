<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 500)->nullable();
            $table->string('users_nickname', 500);
            $table->string('icon', 500)->nullable();
            $table->string('class', 500)->nullable();
            $table->text('assets')->nullable();
            $table->dateTime('loginTime')->nullable();
            $table->dateTime('logoutTime')->nullable();
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
        Schema::dropIfExists('history_users');
    }
}
