<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_agendas', function (Blueprint $table) {
            $table->id();
            $table->string('meeting_num')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('logo')->nullable();
            $table->date('date_1')->nullable();
            $table->string('meeting_kind')->nullable();
            $table->string('meeting_place')->nullable();
            $table->string('meeting_period')->nullable();
            $table->string('meeting_time')->nullable();
            $table->string('meeting_schedule')->nullable();
            $table->string('name_2')->nullable();
            $table->string('name_1')->nullable();
            $table->text('meeting_purpose')->nullable();
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
        Schema::dropIfExists('meeting_agendas');
    }
}
