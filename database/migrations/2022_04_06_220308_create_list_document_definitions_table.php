<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListDocumentDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_document_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('num_create')->nullable();
            $table->string('num_update')->nullable();
            $table->string('code')->nullable();
            $table->string('document_name')->nullable();
            $table->date('date_2')->nullable();
            $table->date('date_3')->nullable();
            $table->integer('num_1')->nullable();
            $table->integer('num_2')->nullable();
            $table->integer('num_3')->nullable();
            $table->integer('num_4')->nullable();
            $table->integer('num_5')->nullable();
            $table->integer('num_6')->nullable();
            $table->integer('num_7')->nullable();
            $table->integer('num_8')->nullable();
            $table->integer('num_9')->nullable();
            $table->integer('num_10')->nullable();
            $table->integer('num_11')->nullable();
            $table->integer('num_12')->nullable();
            $table->string('page_num')->nullable();
            $table->foreignId('list_document_id')->constrained('list_documents')->onDelete('cascade'); 
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
        Schema::dropIfExists('list_document_definitions');
    }
}
