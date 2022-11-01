<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowLogDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_log_definitions', function (Blueprint $table) {
            $table->id();
            $table->text('subject')->nullable();
            $table->text('decision')->nullable();
            $table->text('administrator')->nullable();
            $table->date('date')->nullable();
            $table->string('completed')->nullable();
            $table->string('not_completed')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('follow_log_id')->constrained('follow_logs')->onDelete('cascade'); 
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
        Schema::dropIfExists('follow_log_definitions');
    }
}
