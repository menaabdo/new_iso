<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListInternalAuditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_internal_auditors', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable()->default('pending');
            $table->date('date_1')->nullable();
            $table->date('date_2')->nullable();
            $table->string('name')->nullable();
            $table->string('manager_name')->nullable();
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
        Schema::dropIfExists('list_internal_auditors');
    }
}
