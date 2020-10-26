<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarServicesPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_services_points', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_id')->unsigned();
            $table->string('city');
            $table->string('address');
            $table->string('post_code');
            $table->string('car_brands');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('policy');
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
        Schema::dropIfExists('car_services_points');
    }
}