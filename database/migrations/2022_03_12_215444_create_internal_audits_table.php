<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_audits', function (Blueprint $table) {
            $table->id();
            $table->date('date1')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('referenced_authority');
            $table->string('reference_documents');
            $table->string('reference_name')->nullable();
            $table->string('job')->nullable();
            $table->string('quality_manager_name')->nullable();
            $table->string('company_name')->nullable();
            $table->date('date2')->nullable();
            $table->date('date3')->nullable();
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
        Schema::dropIfExists('internal_audits');
    }
}
