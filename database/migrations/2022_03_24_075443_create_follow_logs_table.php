<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_logs', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('planing')->nullable();
            $table->string('meeting_num')->nullable();
            $table->date('meetting_date')->nullable();
            $table->string('name_1')->nullable();
            $table->string('job_1')->nullable();
            $table->string('name_2')->nullable();
            $table->string('job_2')->nullable();
            $table->string('name_3')->nullable();
            $table->string('job_3')->nullable();
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
        Schema::dropIfExists('follow_logs');
    }
}
