<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingAgendaDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_agenda_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('job')->nullable();
            $table->foreignId('meeting_agenda_id')->constrained('meeting_agendas')->onDelete('cascade'); 
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
        Schema::dropIfExists('meeting_agenda_definitions');
    }
}
