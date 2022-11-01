<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataCollectionReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_collection_reports', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable()->default('pending');
            $table->string('logo')->nullable();
            $table->date('date_1')->nullable();
            $table->string('department')->nullable();
            $table->text('date_details')->nullable();
            $table->text('details')->nullable();
            $table->text('result')->nullable();
            $table->string('name_1')->nullable();
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
        Schema::dropIfExists('data_collection_reports');
    }
}
