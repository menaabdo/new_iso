<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_definitions', function (Blueprint $table) {
            $table->id();
            $table->text('activity')->nullable();
            $table->text('risk')->nullable();
            $table->integer('s_review')->nullable();
            $table->integer('p_review')->nullable();
            $table->integer('r_review')->nullable();
            $table->text('action_taken')->nullable();
            $table->integer('s_procedure')->nullable();
            $table->integer('p_procedure')->nullable();
            $table->integer('r_procedure')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('risk_id')->constrained('risks')->onDelete('cascade'); 
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
        Schema::dropIfExists('risk_definitions');
    }
}
