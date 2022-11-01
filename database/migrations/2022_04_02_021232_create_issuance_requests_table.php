<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuanceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issuance_requests', function (Blueprint $table) {
            $table->id();
            $table->string('management')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('logo')->nullable();
            $table->string('document_code')->nullable();
            $table->string('issue_number')->nullable();
            $table->string('summary')->nullable();
            $table->string('applicant')->nullable();
            $table->string('quality_manager_name')->nullable();
            $table->string('quality_manager_job')->nullable();
            $table->string('document_approved_name')->nullable();
            $table->string('document_approved_job')->nullable();
            $table->date('date_1')->nullable();
            $table->date('quality_manager_date')->nullable();
            $table->date('document_approved_date')->nullable();
            $table->date('release_date')->nullable();
            $table->text('document_type_and_name')->nullable();
            $table->text('quality_manager')->nullable();
            $table->text('reason')->nullable();
            $table->text('suggested_modifications')->nullable();
            $table->text('document_approved_decision')->nullable();
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
        Schema::dropIfExists('issuance_requests');
    }
}
