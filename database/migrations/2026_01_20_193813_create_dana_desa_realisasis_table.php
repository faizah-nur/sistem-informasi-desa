<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dana_desa_realisasis', function (Blueprint $table) {
            $table->id();

            // Tahun anggaran
            $table->year('tahun');

            // Nama kegiatan / program
            $table->string('nama_kegiatan');

            // Anggaran dan realisasi
            $table->bigInteger('anggaran');
            $table->bigInteger('realisasi')->default(0);

            // Tanggal realisasi / kegiatan
            $table->date('tanggal');

            // Keterangan tambahan (opsional)
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dana_desa_realisasis');
    }
};