<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_studies', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable()->default('pending');
            $table->string('logo')->nullable();
            $table->string('customer_number')->nullable();
            $table->string('customer')->nullable();
            $table->string('service')->nullable();
            $table->string('attachment')->nullable();
            $table->string('name_1')->nullable();
            $table->string('name_2')->nullable();
            $table->text('subject_complain')->nullable();
            //$table->text('prompt_action')->nullable();
            $table->date('date_1')->nullable();
            $table->date('date_4')->nullable();
            $table->date('date_3')->nullable();
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
        Schema::dropIfExists('complaint_studies');
    }
}
