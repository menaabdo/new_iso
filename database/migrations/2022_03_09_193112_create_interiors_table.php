<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteriorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interiors', function (Blueprint $table) {
            $table->id();
            $table->string('management')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('head_of_the_review')->nullable();
            $table->string('name')->nullable();
            $table->date('date')->nullable();
            $table->string('company_name')->nullable();
            $table->date('date2')->nullable();
            $table->date('date3')->nullable();
            $table->string('period')->nullable();
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
        Schema::dropIfExists('interiors');
    }
}
