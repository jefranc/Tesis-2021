<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Respuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id()->unique;
            $table->unsignedInteger('pregunta_id');
            $table->string('cedula', 10);
            $table->string('Respuesta'); 
            $table->string('Comentario')->nullable();
            $table->timestamps();

            $table->foreign('pregunta_id')
                ->references('pregunta_id')
                ->on('preguntas')
                ->onDelete('cascade');

            $table->foreign('cedula')
                ->references('cedula')
                ->on('users')
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
        Schema::dropIfExists('respuestas');
    }
}
