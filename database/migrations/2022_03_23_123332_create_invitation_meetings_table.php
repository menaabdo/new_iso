<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitation_meetings', function (Blueprint $table) {
            $table->id();
            $table->date('date_1')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('day')->nullable();
            $table->string('logo')->nullable();
            $table->string('place_meeting')->nullable();
            $table->date('date2')->nullable();
            $table->date('date3')->nullable();
            $table->string('company_name')->nullable();
            $table->string('name_manager')->nullable();
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
        Schema::dropIfExists('invitation_meetings');
    }
}
