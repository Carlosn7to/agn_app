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
        Schema::create('forms_answers', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('active');
            $table->string('answer');
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();


            // Relacionamento entre chaves

            $table->foreign('form_id')->references('id')->on('forms');
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
        Schema::dropIfExists('forms_answers');
    }
};
