<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowUpRecordImprovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_up_record_improvements', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable()->default('pending');
            $table->string('logo')->nullable();
            $table->string('year')->nullable();
            $table->string('name_1')->nullable();
            $table->string('employ')->nullable();
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
        Schema::dropIfExists('follow_up_record_improvements');
    }
}
