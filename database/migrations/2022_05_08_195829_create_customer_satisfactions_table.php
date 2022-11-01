<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSatisfactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_satisfactions', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->integer('excelant_1')->nullable();
            $table->integer('abverage_1')->nullable();
            $table->integer('fair_1')->nullable();
            $table->integer('excelant_2')->nullable();
            $table->integer('abverage_2')->nullable();
            $table->integer('fair_2')->nullable();
            $table->integer('excelant_3')->nullable();
            $table->integer('abverage_3')->nullable();
            $table->integer('fair_3')->nullable();
            $table->integer('excelant_4')->nullable();
            $table->integer('abverage_4')->nullable();
            $table->integer('fair_4')->nullable();
            $table->integer('excelant_5')->nullable();
            $table->integer('abverage_5')->nullable();
            $table->integer('fair_5')->nullable();
            $table->text('nodes')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->date('date_1')->nullable();
            $table->date('date2')->nullable();
            $table->date('date3')->nullable();
            $table->string('company_name')->nullable();
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
        Schema::dropIfExists('customer_satisfactions');
    }
}
