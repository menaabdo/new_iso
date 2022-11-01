<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('term')->nullable();
            $table->string('definition')->nullable();
            $table->foreignId('i_s_o_id')->constrained('i_s_o_s')->onDelete('cascade'); 
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
        Schema::dropIfExists('iso_definitions');
    }
}
