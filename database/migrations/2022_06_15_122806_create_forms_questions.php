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
        Schema::create('forms_questions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('active')->default(1);
            $table->string('question', 255);
            $table->tinyInteger('force')->default(0);
            $table->tinyInteger('type_input');
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();


            // Relaciomaneto entre chaves

            $table->foreign('form_id')->references('id')->on('forms');
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
        Schema::dropIfExists('forms_questions');
    }
};
