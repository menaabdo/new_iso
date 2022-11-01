<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteriorDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interior_definitions', function (Blueprint $table) {
            $table->id();
            $table->text('non_conformity')->nullable();
            $table->text('corrective_action')->nullable();
            $table->integer('action_number')->nullable();
            $table->string('implementation')->nullable();
            $table->string('planned')->nullable();
            $table->string('actual')->nullable();
            $table->foreignId('interior_id')->constrained('interiors')->onDelete('cascade'); 
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
        Schema::dropIfExists('interior_definitions');
    }
}
