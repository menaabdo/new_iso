<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('topic')->nullable();
            $table->string('administrator')->nullable();
            $table->string('time')->nullable();
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
        Schema::dropIfExists('topic_definitions');
    }
}
