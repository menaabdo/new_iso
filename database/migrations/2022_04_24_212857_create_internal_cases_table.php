<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_cases', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->text('political')->nullable();
            $table->text('political_effect')->nullable();
            $table->text('political_monitoring_review')->nullable();
            $table->text('economic')->nullable();
            $table->text('economic_effect')->nullable();
            $table->text('economic_monitoring_review')->nullable();
            $table->text('social')->nullable();
            $table->text('social_effect')->nullable();
            $table->text('social_monitoring_review')->nullable();
            $table->text('technology')->nullable();
            $table->text('technology_effect')->nullable();
            $table->text('technology_monitoring_review')->nullable();
            $table->text('legal')->nullable();
            $table->text('legal_effect')->nullable();
            $table->text('legal_monitoring_review')->nullable();
            $table->text('environment')->nullable();
            $table->text('environment_effect')->nullable();
            $table->text('environment_monitoring_review')->nullable();
            $table->string('name_1')->nullable();
            $table->string('name_2')->nullable();
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
        Schema::dropIfExists('internal_cases');
    }
}
