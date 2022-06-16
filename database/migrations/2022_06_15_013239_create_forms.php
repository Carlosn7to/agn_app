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
            $table->unsignedBigInteger('status_id')->default(1);
            $table->string('name');
            $table->unsignedBigInteger('icon_id')->default(1);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();


            // Relacionamento entre chaves

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('icon_id')->references('id')->on('icons');
            $table->foreign('status_id')->references('id')->on('status');

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
