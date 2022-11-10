<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrokenRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broken_records', function (Blueprint $table) {
            $table->id();
            $table->date('date2')->nullable();
            $table->date('date3')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('company_name')->nullable();
            $table->string('period_time')->nullable();
            $table->string('number_page')->nullable();
            $table->string('number_doc')->nullable();
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->string('source_official')->nullable();
            $table->string('quality_manager')->nullable();
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
        Schema::dropIfExists('broken_records');
    }
}
