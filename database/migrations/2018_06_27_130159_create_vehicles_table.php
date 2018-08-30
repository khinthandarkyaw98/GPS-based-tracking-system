<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('vehicle_id');
            $table->string('vehicle_name');
            $table->string('vehicle_number')->unique();
            $table->unsignedInteger('admin_id');
            $table->unsignedInteger('driver_id')->nullable()->unique();
            $table->unsignedBigInteger('sim_number')->unique();
            $table->string('gps_model');
            $table->unsignedBigInteger('imei')->unique();
            $table->text('description')->nullable();
            //$table->timestamps();

            $table->foreign('admin_id')->references('admin_id')->on('admins')->onDelete('cascade');
            $table->foreign('driver_id')->references('driver_id')->on('drivers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
