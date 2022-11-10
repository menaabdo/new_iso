<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalAuditReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_audit_reports', function (Blueprint $table) {
            $table->id();
            $table->string('manage')->nullable();
            $table->string('referenced_authority')->nullable();
            $table->string('referenced_number')->nullable();
            $table->string('referenced_subject')->nullable();
            $table->string('team_lead')->nullable();
            $table->string('team')->nullable();
            $table->string('referance_name')->nullable();
            $table->string('name')->nullable();
            $table->string('planing')->nullable();
            $table->text('strong_point')->nullable();
            $table->text('no_strong_point')->nullable();
            $table->text('improvement_notes')->nullable();
            $table->date('date_1')->nullable();
            $table->date('date_2')->nullable();
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
        Schema::dropIfExists('internal_audit_reports');
    }
}
