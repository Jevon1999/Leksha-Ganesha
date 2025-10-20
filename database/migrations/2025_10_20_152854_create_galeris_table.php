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
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('title');                    // Judul galeri
            $table->text('description')->nullable();    // Deskripsi galeri
            $table->string('image');                    // Path gambar
            $table->string('category')->default('Umum'); // Kategori galeri
            $table->unsignedInteger('views')->default(0); // Jumlah views
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
