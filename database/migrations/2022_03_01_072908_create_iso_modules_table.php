<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_modules', function (Blueprint $table) {
            $table->id();
            $table->string('model_name')->nullable();
            $table->integer('model_number')->nullable();
            $table->date('model_date')->nullable();
            $table->string('model_period')->nullable();
            $table->string('model_side')->nullable();
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
        Schema::dropIfExists('iso_modules');
    }
}
