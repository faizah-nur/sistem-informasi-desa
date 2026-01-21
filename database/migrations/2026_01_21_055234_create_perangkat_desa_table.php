<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perangkat_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');         // Nama perangkat
            $table->string('jabatan');      // Jabatan
            $table->string('foto')->nullable();  // Path foto, bisa null
            $table->timestamps();           // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perangkat_desa');
    }
};