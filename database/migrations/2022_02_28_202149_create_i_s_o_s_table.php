<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateISOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_s_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('manage_name')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('company_logo')->nullable();
            $table->date('active_date')->nullable();
            $table->date('release_date')->nullable();
            $table->string('document_number')->nullable();
            $table->integer('page_number')->nullable();
            $table->date('review_date')->nullable();
            $table->string('document_code')->nullable();
            $table->string('company_name')->nullable();
            $table->string('procedure_name')->nullable();
            $table->string('version_number')->nullable();
            $table->string('copy_holder')->nullable();
            $table->string('prepare')->nullable();
            $table->string('review')->nullable();
            $table->string('approval')->nullable();
            $table->date('date_1')->nullable();
            $table->date('date_2')->nullable();
            $table->date('date_3')->nullable();
            $table->date('date_4')->nullable();
            $table->integer('page_1')->nullable();
            $table->integer('page_2')->nullable();
            $table->integer('page_3')->nullable();
            $table->integer('page_4')->nullable();
            $table->string('image_illustration')->nullable();
            $table->text('purpose')->nullable();
            $table->text('introduction')->nullable();
            $table->text('scope_of_application')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('action_steps')->nullable();
            $table->text('reference_sources')->nullable();
            $table->integer('type')->nullable();
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
        Schema::dropIfExists('i_s_o_s');
    }
}
