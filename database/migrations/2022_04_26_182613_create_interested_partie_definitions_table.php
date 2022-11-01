<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestedPartieDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interested_partie_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('names')->nullable();
            $table->text('needs')->nullable();
            $table->text('achieves')->nullable();
            $table->text('watches')->nullable();
            $table->foreignId('interested_partie_id')->constrained('interested_parties')->onDelete('cascade'); 
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
        Schema::dropIfExists('interested_partie_definitions');
    }
}
