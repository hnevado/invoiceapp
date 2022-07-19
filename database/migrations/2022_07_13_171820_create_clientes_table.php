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
        Schema::create('clientes', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('id_usuario');

            $table->string('nombre');
            $table->string('empresa');
            $table->string('email');
            $table->string('nif_cif');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('provincia');
            $table->string('pais');

            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
