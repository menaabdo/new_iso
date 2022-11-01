<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risks', function (Blueprint $table) {
            $table->id();
            $table->string('department')->nullable();
            $table->string('prepare')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('approval')->nullable();
            $table->date('date')->nullable();
            $table->string('manager_director')->nullable();
            $table->string('department2')->nullable();
            $table->string('department3')->nullable();
            $table->string('issuance')->nullable();
            $table->string('period')->nullable();
            $table->date('date2')->nullable();
            $table->date('date3')->nullable();
            $table->integer('code')->nullable();
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
        Schema::dropIfExists('risks');
    }
}
