<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_stats', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('conclusion')->nullable();
            $table->string('total_1')->nullable();
            $table->string('total_2')->nullable();
            $table->string('total_3')->nullable();
            $table->string('total_4')->nullable();
            $table->string('total_5')->nullable();
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
        Schema::dropIfExists('contract_stats');
    }
}
