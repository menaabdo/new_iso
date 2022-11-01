<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrctivePreventiveActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrctive_preventive_actions', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->string('logo')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->date('application_date')->nullable();
            $table->string('management_1')->nullable();
            $table->string('reference_order')->nullable();
            $table->integer('non_matching')->nullable();
            $table->integer('number_2')->nullable();
            $table->integer('internal_review')->nullable();
            $table->integer('number_3')->nullable();
            $table->integer('external_review')->nullable();
            $table->integer('number_5')->nullable();
            $table->integer('customer_complaint')->nullable();
            $table->integer('number_4')->nullable();
            $table->integer('management_review')->nullable();
            $table->integer('number_6')->nullable();
            $table->integer('other')->nullable();
            $table->integer('other_1')->nullable();
            $table->text('Summary_analysis')->nullable();
            $table->text('corrective_actions')->nullable();
            $table->text('approval_management')->nullable();
            $table->date('implementation_date')->nullable();
            $table->string('name')->nullable();
            $table->string('employee_1')->nullable();
            $table->date('date_1')->nullable();
            $table->string('name_1')->nullable();
            $table->date('date_2')->nullable();
            $table->string('name_2')->nullable();
            $table->integer('done_1')->nullable();
            $table->integer('done_2')->nullable();
            $table->integer('number_done')->nullable();
            $table->integer('not_done')->nullable();
            $table->integer('need_done')->nullable();
            $table->integer('number_need_done')->nullable();
            $table->string('name_3')->nullable();
            $table->string('name_4')->nullable();
            $table->string('name_5')->nullable();
            $table->string('mang_name')->nullable();
            $table->string('employee')->nullable();
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
        Schema::dropIfExists('corrctive_preventive_actions');
    }
}
