<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_complaints', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('source_complaint')->nullable();
            $table->string('type_product_service')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('place')->nullable();
            $table->text('nodes')->nullable();
            $table->text('subject_complaint')->nullable();
            $table->date('date_1')->nullable();
            $table->date('date_2')->nullable();
            $table->date('date_3')->nullable();
            $table->date('date_4')->nullable();
            $table->date('date_5')->nullable();
            $table->date('date_6')->nullable();
            $table->string('name')->nullable();
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
        Schema::dropIfExists('customer_complaints');
    }
}
