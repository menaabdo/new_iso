<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorListDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('director_list_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('job')->nullable();
            $table->string('manage')->nullable();
            $table->foreignId('director_list_id')->constrained('director_lists')->onDelete('cascade'); 
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
        Schema::dropIfExists('director_list_definitions');
    }
}
