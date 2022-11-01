<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeControlRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_control_requests', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('address')->nullable();
            $table->string('requester')->nullable();
            $table->date('date_1')->nullable();
            $table->string('management')->nullable();
            $table->integer('building')->nullable();
            $table->integer('supplier')->nullable();
            $table->integer('document')->nullable();
            $table->integer('packing')->nullable();
            $table->integer('machine_equipment')->nullable();
            $table->integer('manufacturing')->nullable();
            $table->integer('customize')->nullable();
            $table->integer('other')->nullable();
            $table->text('description')->nullable();
            $table->text('reasone')->nullable();
            $table->text('suggested_change')->nullable();
            $table->string('applicant')->nullable();
            $table->string('section_manager')->nullable();
            $table->date('date_2')->nullable();
            $table->date('date_3')->nullable();
            $table->string('change_level')->nullable();
            $table->text('quality_assurance')->nullable();
            $table->string('quality_manager')->nullable();
            $table->string('review_damaged_document')->nullable();
            $table->string('stability_study')->nullable();
            $table->string('equipment_qualification')->nullable();
            $table->string('process_validation')->nullable();
            $table->string('hygiene_check')->nullable();
            $table->string('recheck')->nullable();
            $table->string('stability_monitoring')->nullable();
            $table->string('name_1')->nullable();
            $table->date('date_4')->nullable();
            $table->string('name_2')->nullable();
            $table->date('date_5')->nullable();
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
        Schema::dropIfExists('change_control_requests');
    }
}
