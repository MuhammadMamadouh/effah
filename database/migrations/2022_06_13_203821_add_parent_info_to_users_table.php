<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentInfoToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('parent_name')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('relative_degree')->nullable();
            $table->string('avaliable_time')->nullable();
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
            $table->dropColumn('parent_name');
            $table->dropColumn('parent_phone');
            $table->dropColumn('relative_degree');
            $table->dropColumn('avaliable_time');
        });
    }
}
