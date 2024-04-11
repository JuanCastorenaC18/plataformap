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
        Schema::create('user_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sexo')->nullable();
            $table->text('fecha_alta')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('tel_celular')->nullable();
            $table->string('tel_particular')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->text('informacion')->nullable();
            $table->string('calle')->nullable();
            $table->string('municipio')->nullable();
            $table->string('seccion')->nullable();
            $table->string('num')->nullable();
            $table->string('int')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('colonia')->nullable();
            $table->string('clave')->nullable();
            $table->unsignedBigInteger('coordinador_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('coordinador_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_detail');
    }
};
