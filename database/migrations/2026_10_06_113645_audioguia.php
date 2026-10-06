<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create ('visitas', function(Blueprint $table)
        {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->boolean('activo')->default(true);
        });

        Schema::create ('recorridos', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('visita_id');
            $table->foreign('visita_id')->references('id')->on('visitas');
            $table->string('titulo');
            $table->text('descripcion');
            $table->boolean('activo')->default(true);
        });

         Schema::create ('elementos', function(Blueprint $table)
        {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->boolean('activo')->default(true);
        });

         Schema::create ('recorridos_elementos', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('recorrido_id');
            $table->foreign('recorrido_id')->references('id')->on('recorridos');
            $table->unsignedBigInteger('elemento_id');
            $table->foreign('elemento_id')->references('id')->on('elementos');
        });

         Schema::create ('tipos_accesibilidad', function(Blueprint $table)
        {
            $table->id();
            $table->string('titulo');
        });

         Schema::create ('accesibilidad', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('elemento_id');
            $table->foreign('elemento_id')->references('id')->on('elementos');
            $table->unsignedBigInteger('tipos_id');
            $table->foreign('tipos_id')->references('id')->on('tipos_accesibilidad');
            $table->text('advertencia');        
        });

         Schema::create ('imagenes', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('elemento_id');
            $table->foreign('elemento_id')->references('id')->on('elementos');
            $table->string('url');
        });

        Schema::create ('videos', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('elemento_id');
            $table->foreign('elemento_id')->references('id')->on('elementos');
            $table->string('url');
        });

        Schema::create ('audios', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('elemento_id');
            $table->foreign('elemento_id')->references('id')->on('elementos');
            $table->string('url');
            $table->text('transcripcion');
        });

         Schema::create ('carrusel', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('imagen_id');
            $table->foreign('imagen_id')->references('id')->on('imagenes');
            $table->unsignedBigInteger('videos_id');
            $table->foreign('videos_id')->references('id')->on('videos');
            $table->unsignedBigInteger('elemento_id');
            $table->foreign('elemento_id')->references('id')->on('elementos');                   
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitas');
        Schema::dropIfExists('recorridos');
        Schema::dropIfExists('recorridos_elementos');
        Schema::dropIfExists('elementos');
        Schema::dropIfExists('accesibilidad');
        Schema::dropIfExists('tipos_accesibilidad');
        Schema::dropIfExists('imagenes');
        Schema::dropIfExists('videos');
        Schema::dropIfExists('audios');
        Schema::dropIfExists('carrusel');
    }
};
