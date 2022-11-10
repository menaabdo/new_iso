<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportNonConformanceCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_non_conformance_cases', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable()->default('pending');
            $table->date('date2')->nullable();
            $table->date('date3')->nullable();
            $table->string('company_name')->nullable();
            $table->string('period_time')->nullable();
            $table->string('number_page')->nullable();
            $table->string('number_doc')->nullable();
            $table->string('logo')->nullable();
            $table->string('day_from')->nullable();
            $table->string('day_to')->nullable();
            $table->date('date_1')->nullable();
            $table->date('date_2')->nullable();
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
        Schema::dropIfExists('report_non_conformance_cases');
    }
}
