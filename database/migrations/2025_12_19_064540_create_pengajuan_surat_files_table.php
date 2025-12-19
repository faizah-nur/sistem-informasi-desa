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
    Schema::create('pengajuan_surat_files', function (Blueprint $table) {
        $table->id();

        $table->foreignId('pengajuan_surat_id')
              ->constrained('pengajuan_surats')
              ->cascadeOnDelete();

        $table->string('nama_file');
        $table->string('path');

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('pengajuan_surat_files');
}

};