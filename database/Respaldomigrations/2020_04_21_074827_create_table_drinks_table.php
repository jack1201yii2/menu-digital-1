<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_drinks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('drink_id')->unsigned();
            $table->bigInteger('table_diner_id')->unsigned();
            $table->timestamps();

            $table->foreign('drink_id')->references('id')->on('drinks');
            $table->foreign('table_diner_id')->references('id')->on('table_diners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_drinks');
    }
}
