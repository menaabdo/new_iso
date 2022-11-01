<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrokenRecordDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broken_record_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('type_recourd')->nullable();
            $table->string('code')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('save_place')->nullable();
            $table->string('kyend_del')->nullable();
            $table->date('date_1')->nullable();
            $table->foreignId('broken_record_id')->constrained('broken_records')->onDelete('cascade'); 
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
        Schema::dropIfExists('broken_record_definitions');
    }
}
