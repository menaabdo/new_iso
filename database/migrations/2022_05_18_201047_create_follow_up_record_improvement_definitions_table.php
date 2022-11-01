<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowUpRecordImprovementDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_up_record_improvement_definitions', function (Blueprint $table) {
            $table->id();
            $table->date('date_1')->nullable();
            $table->string('dapartment')->nullable();
            $table->string('description')->nullable();
            $table->string('action')->nullable();
            $table->string('employee')->nullable();
            $table->string('implementation')->nullable();
            $table->string('follow_implementation')->nullable();
            $table->string('nodes')->nullable();
            $table->foreignId('follow_up_id')->constrained('follow_up_record_improvements')->onDelete('cascade'); 
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
        Schema::dropIfExists('follow_up_record_improvement_definitions');
    }
}
