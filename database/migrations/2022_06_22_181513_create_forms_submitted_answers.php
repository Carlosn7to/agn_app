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
        Schema::create('forms_submitted_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('worksheet_id');
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('form_submitted_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('user_id');
            $table->string('answer', 500)->nullable()->default(' ');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('worksheet_id')->references('id')->on('worksheets');
            $table->foreign('form_id')->references('id')->on('forms');
            $table->foreign('form_submitted_id')->references('id')->on('forms_submitted');
            $table->foreign('question_id')->references('id')->on('forms_questions');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms_submitted_answers');
    }
};
