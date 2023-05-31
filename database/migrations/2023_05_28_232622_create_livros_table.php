<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('isbn');
            $table->integer('numpaginas');
            $table->integer('numedicao');
            $table->integer('anopublicacao');
            $table->unsignedBigInteger('id_editora');
            $table->foreign('id_editora')->references('id')->on('editora')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('livros');
    }
};
