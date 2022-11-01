<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationMeetingDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitation_meeting_definitions', function (Blueprint $table) {
            $table->id();
            $table->date('recive_date')->nullable();
            $table->string('name_1')->nullable();
            $table->string('job_1')->nullable();
            $table->foreignId('invitation_meeting_id')->constrained('invitation_meetings')->onDelete('cascade'); 
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
        Schema::dropIfExists('invitation_meeting_definitions');
    }
}
