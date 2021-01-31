<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('permission.table_names');

        Schema::create('ciclos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ciclo', 50);
        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 50);
        });

        Schema::create('preguntas', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('descripcion');
            $table->bigInteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->string('tipo');
            $table->timestamps();
        });

        Schema::create('respuestas', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('resultado');
            $table->string('user_id', 10);
            $table->bigInteger('pregunta_id')->unsigned();
            $table->string('ciclo', 50);
            $table->timestamps();

            $table->foreign('user_id')->references('cedula')->on('users')->onDelete('cascade');
            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('preguntas');
        Schema::dropIfExists('respuestas');
    }
}
