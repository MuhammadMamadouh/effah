<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('about_you')->nullable();
            $table->longText('about_partner')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('education_id')->nullable();
            $table->unsignedBigInteger('universty_id')->nullable();
            $table->unsignedBigInteger('college_id')->nullable();
            $table->date('birth_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('about_you');
            $table->dropColumn('about_partner');
            $table->dropColumn('district_id');
            $table->dropColumn('education_id');
            $table->dropColumn('universty_id');
            $table->dropColumn('college_id');
            $table->dropColumn('birth_date');
        });

    }
}
