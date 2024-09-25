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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Crea el campo id (clave primaria)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Establece la relación con users
            $table->text('content'); // Crea el campo de contenido del post
            $table->timestamps(); // Crea campos de timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

