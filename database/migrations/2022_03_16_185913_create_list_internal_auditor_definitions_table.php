<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListInternalAuditorDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_internal_auditor_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('manage')->nullable();
            $table->date('date')->nullable();
            $table->string('place')->nullable();
            $table->foreignId('list_auditor_id')->constrained('list_internal_auditors')->onDelete('cascade'); 
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
        Schema::dropIfExists('list_internal_auditor_definitions');
    }
}
