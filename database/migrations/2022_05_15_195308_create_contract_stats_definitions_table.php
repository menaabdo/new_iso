<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractStatsDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_stats_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('mounth')->nullable();
            $table->integer('permeable1')->nullable();
            $table->integer('impermeable1')->nullable();
            $table->integer('impermeable2')->nullable();
            $table->integer('permeable2')->nullable();
            $table->text('nodes')->nullable();
            $table->foreignId('contract_stats_id')->constrained('contract_stats')->onDelete('cascade'); 
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
        Schema::dropIfExists('contract_stats_definitions');
    }
}
