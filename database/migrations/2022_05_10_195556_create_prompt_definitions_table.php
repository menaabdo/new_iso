<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromptDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prompt_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('action')->nullable();
            $table->string('implementation')->nullable();
            $table->date('date_2')->nullable();
            $table->foreignId('complaint_study_id')->constrained('complaint_studies')->onDelete('cascade'); 
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
        Schema::dropIfExists('prompt_definitions');
    }
}
