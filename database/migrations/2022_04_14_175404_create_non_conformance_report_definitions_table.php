<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonConformanceReportDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_conformance_report_definitions', function (Blueprint $table) {
            $table->id();
            $table->date('date_1')->nullable();
            $table->string('management')->nullable();
            $table->string('description')->nullable();
            $table->string('action_taken')->nullable();
            $table->string('responsible_implementation')->nullable();
            $table->string('implementation_scheme')->nullable();
            $table->string('follow_implementation')->nullable();
            $table->string('notes')->nullable();
            $table->foreignId('conformance_report_id')->constrained('non_conformance_reports')->onDelete('cascade'); 
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
        Schema::dropIfExists('non_conformance_report_definitions');
    }
}
