<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('second_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('age')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo_id')->nullable();
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
            $table->dropColumn('second_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('age');
            $table->dropColumn('city');
            $table->dropColumn('phone');
            $table->dropColumn('photo_id');
        });
    }
}
