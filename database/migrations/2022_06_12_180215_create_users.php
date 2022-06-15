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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('active')->default(1);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('image', 255)->default('padrão.png');
            $table->unsignedBigInteger('sector_id')->default(1);
            $table->unsignedBigInteger('occupation_id')->default(1);
            $table->unsignedBigInteger('company_id')->default(1);
            $table->unsignedBigInteger('privilege_id')->default(1);
            $table->timestamps();
            $table->softDeletes();


            // Relacionamento entre chaves

            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->foreign('occupation_id')->references('id')->on('occupations');
            $table->foreign('company_id')->references('id')->on('companys');
            $table->foreign('privilege_id')->references('id')->on('privileges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
