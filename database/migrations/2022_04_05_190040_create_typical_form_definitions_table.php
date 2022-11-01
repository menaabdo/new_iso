<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypicalFormDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typical_form_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('document_name')->nullable();
            $table->string('document_code')->nullable();
            $table->string('number_copy')->nullable();
            $table->date('date1')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('typical_form_id')->constrained('typical_forms')->onDelete('cascade'); 
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
        Schema::dropIfExists('typical_form_definitions');
    }
}
