<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonConformitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_conformities', function (Blueprint $table) {
            $table->id();
            $table->string('number_1')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('logo')->nullable();
            $table->date('date_1')->nullable();
            $table->string('competent_authority')->nullable();
            $table->string('non_compliance_system')->nullable();
            $table->text('summary_analysis')->nullable();
            $table->string('name_1')->nullable();
            $table->string('name_2')->nullable();
            $table->string('name_3')->nullable();
            $table->string('employ_1')->nullable();
            $table->string('employ_2')->nullable();
            $table->string('employ_3')->nullable();
            $table->text('case_study')->nullable();
            $table->text('decision_taken')->nullable();
            $table->string('name_4')->nullable();
            $table->string('name_5')->nullable();
            $table->string('name_6')->nullable();
            $table->string('employ_4')->nullable();
            $table->string('name_7')->nullable();
            $table->string('employ_5')->nullable();
            $table->text('follow_up_decision')->nullable();
            $table->date('date_2')->nullable();
            $table->integer('effectively_implemented')->nullable();
            $table->integer('implemented_needs_corrective')->nullable();
            $table->string('number_2')->nullable();
            $table->date('date2')->nullable();
            $table->date('date3')->nullable();
            $table->string('company_name')->nullable();
            $table->string('period_time')->nullable();
            $table->string('number_page')->nullable();
            $table->string('number_doc')->nullable();
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
        Schema::dropIfExists('non_conformities');
    }
}
