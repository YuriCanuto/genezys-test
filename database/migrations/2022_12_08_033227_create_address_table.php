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
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_main')->default(true)->comment('Define qual endereço é o principal');
            $table->string('street')->comment('Rua ou Logradouro onde o usuário reside');
            $table->string('number')->nullable()->comment('Número referente a residência do usuário');
            $table->string('complement')->nullable()->comment('Complemento do endereço do usuário');
            $table->string('neighborhood')->comment('Bairro da residência do usuário');
            $table->string('city')->comment('Cidade da residência do usuário');
            $table->string('state')->comment('Estado da residência do usuário');
            $table->string('zipcode')->comment('CEP da residência do usuário');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('adresses');
    }
};
