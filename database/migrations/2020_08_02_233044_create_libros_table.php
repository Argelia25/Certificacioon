<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
             $table->string('Titulo')->nullable();
             $table->integer('Autor_id')->nullable();
             $table->integer('Editorial_id')->nullable();
             $table->integer('Categoria_id')->nullable();
            $table->integer('paginas')->nullable();
            $table->integer('Disponibles')->nullable();
            $table->string('Idioma')->nullable();
            $table->string('Foto')->nullable();
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
        Schema::drop('libros');
    }
}
