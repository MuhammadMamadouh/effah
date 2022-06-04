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
            $table->id();
            $table->string('frName');
            $table->string('lsName')->nullable();
            $table->string('FaName')->nullable();
            $table->string('idNumber')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('is_login')->default(0);
            $table->tinyInteger('gender')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_wait')->default(0);

            $table->string('phone_Code')->nullable();

            $table->string('phone')->unique();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('gov_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->integer('lastLoginAt')->nullable();
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
