<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('event_description');
            $table->string('age')->nullable();
            $table->string('city')->nullable();
            $table->string('price')->nullable();
            $table->date('applied_at')->nullable();
            $table->date('denied_at')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->string('applied_by')->nullable();
            $table->string('denied_by')->nullable();
            $table->boolean('passed')->nullable();
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
        Schema::dropIfExists('table_events');
    }
}
