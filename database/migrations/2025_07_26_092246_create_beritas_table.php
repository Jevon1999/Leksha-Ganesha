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
    Schema::create('beritas', function (Blueprint $table) {
        $table->id();
        $table->string('image');         // path gambar
        $table->string('title');         // judul
        $table->text('text');            // isi/cuplikan berita
        $table->unsignedInteger('views')->default(0); // jumlah views
        $table->timestamps();;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
