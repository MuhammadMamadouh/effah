<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('male_id');
            $table->unsignedBigInteger('female_id');
            $table->string('type');
            $table->boolean('viewed')->default(false);
            $table->dateTime('viewed_at')->nullable();
            $table->boolean('accept')->default(false);
            $table->dateTime('accept_at')->nullable();
            $table->boolean('request_sent')->default(false);
            $table->dateTime('req_sent_at')->nullable();
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
        Schema::dropIfExists('relationships');
    }
}
