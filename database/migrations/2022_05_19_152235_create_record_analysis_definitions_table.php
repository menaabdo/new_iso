<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordAnalysisDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_analysis_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('area')->nullable();
            $table->string('customer')->nullable();
            $table->integer('yes_1')->nullable();
            $table->integer('no_1')->nullable();
            $table->integer('yes_2')->nullable();
            $table->integer('no_2')->nullable();
            $table->integer('yes_3')->nullable();
            $table->integer('no_3')->nullable();
            $table->integer('yes_4')->nullable();
            $table->integer('no_4')->nullable();
            $table->integer('GG_1')->nullable();
            $table->integer('G_1')->nullable();
            $table->integer('M_1')->nullable();
            $table->integer('GG_2')->nullable();
            $table->integer('G_2')->nullable();
            $table->integer('M_2')->nullable();
            $table->integer('GG_3')->nullable();
            $table->integer('G_3')->nullable();
            $table->integer('M_3')->nullable();
            $table->integer('GG_4')->nullable();
            $table->integer('G_4')->nullable();
            $table->integer('M_4')->nullable();
            $table->integer('GG_5')->nullable();
            $table->integer('G_5')->nullable();
            $table->integer('M_5')->nullable();
            $table->integer('GG_6')->nullable();
            $table->integer('G_6')->nullable();
            $table->integer('M_6')->nullable();
            $table->string('percentage')->nullable();
            $table->foreignId('record_analyses_id')->constrained('record_analyses')->onDelete('cascade'); 
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
        Schema::dropIfExists('record_analysis_definitions');
    }
}
