<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('admin_id');
            //$table->integer('user_id')->autoIncrement();
            $table->string('admin_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('phone')->nullable();
            $table->string('activation_code')->nullable();
            $table->string('remember_token')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
