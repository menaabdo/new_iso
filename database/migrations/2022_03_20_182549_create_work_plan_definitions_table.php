<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkPlanDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_plan_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('referenced_authority')->nullable();
            $table->string('review_topics');
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
            $table->string('notes')->nullable();
            $table->foreignId('work_plan_id')->constrained('work_plans')->onDelete('cascade'); 
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
        Schema::dropIfExists('work_plan_definitions');
    }
}
