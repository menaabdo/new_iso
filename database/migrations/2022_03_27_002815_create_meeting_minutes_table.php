<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingMinutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_minutes', function (Blueprint $table) {
            $table->id();
            $table->string('num')->nullable();
            $table->string('logo')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('place_meeting')->nullable();
            $table->string('time_meeting')->nullable();
            $table->text('stand_review')->nullable();
            $table->text('improve_efficiency_1')->nullable();
            $table->text('improve_efficiency_2')->nullable();
            $table->text('improve_efficiency_3')->nullable();
            $table->text('improve_service_1')->nullable();
            $table->text('improve_service_2')->nullable();
            $table->text('improve_service_3')->nullable();
            $table->text('hr_1')->nullable();
            $table->text('hr_2')->nullable();
            $table->text('hr_3')->nullable();
            $table->date('date_1')->nullable();
            $table->date('date_2')->nullable();
            $table->date('date_3')->nullable();
            $table->string('name_1')->nullable();
            $table->string('name_2')->nullable();
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
        Schema::dropIfExists('meeting_minutes');
    }
}
