<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('money_amount');
            $table->dateTime('launchedTime');
            $table->dateTime('removedTime')->nullable();
            $table->string('picture', 500)->nullable();
            $table->text('description')->nullable();
            $table->text('introduction')->nullable();
            $table->integer('originalPrice');
            $table->integer('discountPrice')->nullable();
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
        Schema::dropIfExists('history_products');
    }
}
