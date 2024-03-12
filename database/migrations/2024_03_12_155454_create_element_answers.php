<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('element_answers', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->integer('seq');
            $table->unsignedBigInteger('element_question_id');
            $table->foreign('element_question_id')->references('id')->on('element_questions');
            $table->unsignedBigInteger('element_id');
            $table->foreign('element_id')->references('id')->on('element_master');
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
        Schema::dropIfExists('element_answers');
    }
};
