<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('count_answers');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('answer_id')->nullable()->default(NULL);
            $table->foreign('answer_id')->references('id')->on('answers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->unsignedBigInteger('auto_answer_id')->nullable()->default(NULL);
            $table->foreign('auto_answer_id')->references('id')->on('auto_answers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
