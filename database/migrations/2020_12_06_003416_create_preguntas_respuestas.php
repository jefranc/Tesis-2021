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
        Schema::create($tableNames['categorias'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 50);
        });

        Schema::create($tableNames['preguntas'], function (Blueprint $table) use ($tableNames, $columnNames){
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->integer('categoria_id');

            $table->foreign('categoria_id')
                ->references('id')
                ->on($tableNames['categorias'])
                ->onDelete('cascade');
        });

        Schema::create($tableNames['respuestas'], function (Blueprint $table) use ($tableNames, $columnNames){
            $table->id();
            $table->integer('resultado');
            $table->integer('user_id');
            $table->integer('pregunta_id');
            $table->timestamp('created_at')->nullable();

            $table->foreign('user_id')
                ->references('cedula')
                ->on($tableNames['users'])
                ->onDelete('cascade');

            $table->foreign('pregunta_id')
                ->references('id')
                ->on($tableNames['preguntas'])
                ->onDelete('cascade');
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
