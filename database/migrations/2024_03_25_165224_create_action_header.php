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
        Schema::create('action_header', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->string('answer');
            $table->unsignedBigInteger('form_header_id');
            $table->foreign('form_header_id')->references('id')->on('form_header');
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
        Schema::dropIfExists('action_header');
    }
};
