<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('cedula', 10)->unique();
            $table->string('password');
            $table->string('imagen')->nullable();
            $table->string('rol')->nullable();
            $table->string('status', 1);
            $table->string('auto', 1);
            $table->string('evaluador1', 10)->nullable();
            $table->string('evaluador2', 10)->nullable();
            $table->string('evaluador3', 10)->nullable();
            $table->string('evaluador4', 10)->nullable();
            $table->string('evaluador5', 10)->nullable();
            $table->rememberToken();
            $table->timestamps();
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
}
