<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnaireFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_forms', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('emp_name')->nullable();
            $table->date('date_1')->nullable();
            $table->string('customer_service_name')->nullable();
            $table->integer('excelant_1')->nullable();
            $table->integer('abverage_1')->nullable();
            $table->integer('fair_1')->nullable();
            $table->string('node_1')->nullable();
            $table->integer('excelant_2')->nullable();
            $table->integer('abverage_2')->nullable();
            $table->integer('fair_2')->nullable();
            $table->string('node_2')->nullable();
            $table->integer('excelant_3')->nullable();
            $table->integer('abverage_3')->nullable();
            $table->integer('fair_3')->nullable();
            $table->string('node_3')->nullable();
            $table->integer('excelant_4')->nullable();
            $table->integer('abverage_4')->nullable();
            $table->integer('fair_4')->nullable();
            $table->string('node_4')->nullable();
            $table->integer('excelant_5')->nullable();
            $table->integer('abverage_5')->nullable();
            $table->integer('fair_5')->nullable();
            $table->string('node_5')->nullable();
            $table->integer('excelant_6')->nullable();
            $table->integer('abverage_6')->nullable();
            $table->integer('fair_6')->nullable();
            $table->string('node_6')->nullable();
            $table->integer('excelant_7')->nullable();
            $table->integer('abverage_7')->nullable();
            $table->integer('fair_7')->nullable();
            $table->string('node_7')->nullable();
            $table->integer('excelant_8')->nullable();
            $table->integer('abverage_8')->nullable();
            $table->integer('fair_8')->nullable();
            $table->string('node_8')->nullable();
            $table->integer('excelant_9')->nullable();
            $table->integer('abverage_9')->nullable();
            $table->integer('fair_9')->nullable();
            $table->string('node_9')->nullable();
            $table->integer('excelant_10')->nullable();
            $table->integer('abverage_10')->nullable();
            $table->integer('fair_10')->nullable();
            $table->string('node_10')->nullable();
            $table->date('date2')->nullable();
            $table->date('date3')->nullable();
            $table->string('company_name')->nullable();
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
        Schema::dropIfExists('questionnaire_forms');
    }
}
