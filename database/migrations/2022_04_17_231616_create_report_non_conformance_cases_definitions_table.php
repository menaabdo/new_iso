<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportNonConformanceCasesDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_non_conformance_cases_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('case_non_conformance')->nullable();
            $table->date('date_3')->nullable();
            $table->string('management')->nullable();
            $table->string('reason')->nullable();
            $table->integer('corrective')->nullable();
            $table->integer('preventive')->nullable();
            $table->integer('completed')->nullable();
            $table->integer('non_completed')->nullable();
            $table->string('notes')->nullable();
            $table->foreignId('report_cases_id')->constrained('report_non_conformance_cases')->onDelete('cascade'); 
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
        Schema::dropIfExists('report_non_conformance_cases_definitions');
    }
}
