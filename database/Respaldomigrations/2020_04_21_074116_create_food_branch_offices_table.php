<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodBranchOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_branch_offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('food_id')->unsigned();
            $table->bigInteger('branch_office_id')->unsigned();
            $table->timestamps();

            $table->foreign('food_id')->references('id')->on('foods');
            $table->foreign('branch_office_id')->references('id')->on('branch_offices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_branch_offices');
    }
}
