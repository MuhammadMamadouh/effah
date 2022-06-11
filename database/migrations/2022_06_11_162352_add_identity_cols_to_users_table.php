<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdentityColsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('passport_image')->nullable();
            $table->string('identity_face')->nullable();
            $table->string('identity_back')->nullable();
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
            $table->dropColumn('passport_image')->nullable();
            $table->dropColumn('identity_face')->nullable();
            $table->dropColumn('identity_back')->nullable();
        });
    }
}
