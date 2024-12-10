<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('notes', function (Blueprint $table) {
        $table->id(); // ID autoincrementable
        $table->string('title'); // Título de la nota
        $table->text('content'); // Contenido de la nota
        $table->string('image')->nullable(); // Imagen opcional
        $table->timestamps(); // created_at y updated_at
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
