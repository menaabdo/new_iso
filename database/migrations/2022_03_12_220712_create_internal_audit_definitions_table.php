<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalAuditDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_audit_definitions', function (Blueprint $table) {
            $table->id();
            $table->text('review_question')->nullable();
            $table->text('identical')->nullable();
            $table->text('not_identical')->nullable();
            $table->text('objective_evidence')->nullable();
            $table->foreignId('internal_audit_id')->constrained('internal_audits')->onDelete('cascade');
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
        Schema::dropIfExists('internal_audit_definitions');
    }
}
