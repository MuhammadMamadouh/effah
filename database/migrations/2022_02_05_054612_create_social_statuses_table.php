<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->text('info')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->unsignedBigInteger('re_id')->nullable();
            $table->foreign('re_id')->references('id')->on('religions')->onDelete('cascade');
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
        Schema::dropIfExists('social_statuses');
    }
}
