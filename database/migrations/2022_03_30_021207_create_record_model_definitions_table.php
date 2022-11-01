<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordModelDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_model_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('name_action')->nullable();
            $table->string('code_action')->nullable();
            $table->string('period_action')->nullable();
            $table->text('notes_action')->nullable();
            $table->integer('number')->nullable();
            $table->date('date_action')->nullable();
            $table->foreignId('record_model_id')->constrained('record_models')->onDelete('cascade'); 
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
        Schema::dropIfExists('record_model_definitions');
    }
}
