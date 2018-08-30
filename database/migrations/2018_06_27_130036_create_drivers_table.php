<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('driver_id');
            $table->string('driver_name');
            $table->unsignedInteger('admin_id');
            $table->unsignedInteger('vehicle_id')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('activatiion_code')->nullable();
            $table->unsignedBigInteger('phone')->nullable();
            $table->string('remember_token')->nullable();
            //$table->timestamps();

            $table->foreign('admin_id')->references('admin_id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
