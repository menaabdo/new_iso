<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_stats', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('conclusion')->nullable();
            $table->string('total_1')->nullable();
            $table->string('total_2')->nullable();
            $table->string('total_3')->nullable();
            $table->string('total_4')->nullable();
            $table->string('total_5')->nullable();
            $table->string('total_6')->nullable();
            $table->string('total_7')->nullable();
            $table->string('total_8')->nullable();
            $table->string('total_9')->nullable();
            $table->string('total_10')->nullable();
            $table->string('total_11')->nullable();
            $table->string('total_12')->nullable();
            $table->string('total_13')->nullable();
            $table->date('date2')->nullable();
            $table->date('date3')->nullable();
            $table->string('company_name')->nullable();
            $table->string('period_time')->nullable();
            $table->string('number_page')->nullable();
            $table->string('number_doc')->nullable();
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
        Schema::dropIfExists('training_stats');
    }
}
