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
        Schema::create('simpatizante', function (Blueprint $table) {
            $table->id();
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->text('fecha_alta');
            $table->string('ocupacion');
            $table->string('tel_celular');
            $table->string('tel_particular');
            $table->string('email')->unique();
            $table->string('facebook')->unique();
            $table->string('twitter')->unique();
            $table->string('informacion')->nullable();
            $table->string('calle');
            $table->string('municipio');
            $table->string('seccion');
            $table->string('num');
            $table->string('int')->nullable();
            $table->string('codigo_postal');
            $table->string('colonia');
            $table->string('clave');
            $table->string('usuario');
            $table->string('password');
            $table->boolean('status')->default(true);
            $table->boolean('process')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpatizante');
    }
};
