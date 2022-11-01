<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordActionDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_action_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('name_action')->nullable();
            $table->string('code_action')->nullable();
            $table->string('period_action')->nullable();
            $table->text('notes_action')->nullable();
            $table->integer('number')->nullable();
            $table->date('date_action')->nullable();
            $table->foreignId('record_action_id')->constrained('record_actions')->onDelete('cascade'); 
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
        Schema::dropIfExists('record_action_definitions');
    }
}
