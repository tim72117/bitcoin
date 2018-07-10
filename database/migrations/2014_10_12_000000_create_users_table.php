<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('identity', 10);
            $table->string('provider_id', 50)->nullable();
            $table->string('avatar', 50)->nullable();
            $table->tinyInteger('status')->default(true);
            $table->string('confirmation_code', 50)->nullable();
            $table->boolean('confirmed')->default(false);
            $table->string('country_code', 4)->nullable();
            $table->string('phone', 20)->nullable();
            $table->boolean('phone_confirmed')->default(false);
            $table->string('google2fa_secret', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
