<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_plans', function (Blueprint $table) {
            $table->id();
            $table->date('date_1')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('planing');
            $table->string('name_1')->nullable();
            $table->string('job_1')->nullable();
            $table->string('name_2')->nullable();
            $table->string('job_2')->nullable();
            $table->string('name_3')->nullable();
            $table->string('job_3')->nullable();
            $table->integer('planned')->nullable();
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
        Schema::dropIfExists('work_plans');
    }
}
