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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id')->default(3);
            $table->string('name');
            $table->string('description', 255)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('worksheet_id');
            $table->timestamps();
            $table->softDeletes();


            // Relacionamento entre chaves

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('worksheet_id')->references('id')->on('worksheets');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
};
