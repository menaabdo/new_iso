<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordCanceledDocumentDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_canceled_document_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('name_action')->nullable();
            $table->string('code_action')->nullable();
            $table->text('reasone_cancel')->nullable();
            $table->text('notes_action')->nullable();
            $table->integer('number')->nullable();
            $table->date('date_action')->nullable();
            $table->integer('number2')->nullable();
            $table->date('date_action2')->nullable();
            $table->foreignId('document_id')->constrained('record_canceled_documents')->onDelete('cascade'); 
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
        Schema::dropIfExists('record_canceled_document_definitions');
    }
}
