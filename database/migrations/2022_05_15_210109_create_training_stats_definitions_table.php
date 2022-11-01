<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingStatsDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_stats_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('managment')->nullable();
            $table->integer('jan')->nullable();
            $table->integer('feb')->nullable();
            $table->integer('mar')->nullable();
            $table->integer('epr')->nullable();
            $table->integer('may')->nullable();
            $table->integer('jaun')->nullable();
            $table->integer('jun')->nullable();
            $table->integer('augest')->nullable();
            $table->integer('sep')->nullable();
            $table->integer('oct')->nullable();
            $table->integer('nov')->nullable();
            $table->integer('des')->nullable();
            $table->string('total_trainees')->nullable();
            $table->foreignId('training_stats_id')->constrained('training_stats')->onDelete('cascade'); 
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
        Schema::dropIfExists('training_stats_definitions');
    }
}
