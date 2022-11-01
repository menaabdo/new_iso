<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeInternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_internals', function (Blueprint $table) {
            $table->id();
            $table->string('to')->nullable();
            $table->string('from');
            $table->string('status')->nullable()->default('pending');
            $table->string('revision_number')->nullable();
            $table->string('place_review')->nullable();
            $table->string('time')->nullable();
            $table->string('implementation_review')->nullable();
            $table->text('review')->nullable();
            $table->text('references_used')->nullable();
            $table->string('team_1')->nullable();
            $table->string('team_2')->nullable();
            $table->date('date')->nullable();
            $table->date('date_4')->nullable();
            $table->date('date_5')->nullable();
            $table->date('date_6')->nullable();
            $table->date('date_7')->nullable();
            $table->date('date2')->nullable();
            $table->date('date3')->nullable();
            $table->string('name_2')->nullable();
            $table->string('name_1')->nullable();
            $table->string('name_3')->nullable();
            $table->string('name_4')->nullable();
            $table->string('job')->nullable();
            $table->string('job_2')->nullable();
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
        Schema::dropIfExists('notice_internals');
    }
}
