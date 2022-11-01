<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_documents', function (Blueprint $table) {
            $table->id();
            $table->date('date_1')->nullable();
            $table->string('logo')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('name_1')->nullable();
            $table->string('job_1')->nullable();
            $table->string('name_2')->nullable();
            $table->string('job_2')->nullable();
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
        Schema::dropIfExists('list_documents');
    }
}
