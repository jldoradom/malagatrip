<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->string('valor');
            $table->timestamps();
        });



        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('texto');
            $table->string('servicio');
            $table->string('precio');
            $table->foreignId('nota_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('establecimiento_id')->constrained();
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
        Schema::dropIfExists('notas');
        Schema::dropIfExists('comentarios');
    }
}
