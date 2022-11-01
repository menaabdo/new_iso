<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowUpRecordDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_up_record_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->date('date_1')->nullable();
            $table->string('management')->nullable();
            $table->string('subject')->nullable();
            $table->string('result')->nullable();
            $table->integer('one')->nullable();
            $table->integer('two')->nullable();
            $table->integer('three')->nullable();
            $table->integer('four')->nullable();
            $table->integer('five')->nullable();
            $table->integer('six')->nullable();
            $table->integer('seven')->nullable();
            $table->integer('eight')->nullable();
            $table->integer('nine')->nullable();
            $table->foreignId('follow_up_record_id')->constrained('follow_up_records')->onDelete('cascade'); 
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
        Schema::dropIfExists('follow_up_record_definitions');
    }
}
