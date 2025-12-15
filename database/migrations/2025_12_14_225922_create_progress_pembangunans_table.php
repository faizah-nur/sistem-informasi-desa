<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('progress_pembangunan', function (Blueprint $table) {
            $table->id();
            $table->string('judul_kegiatan', 150);
            $table->text('deskripsi');
            $table->unsignedTinyInteger('persentase_progress')->default(0);
            $table->enum('status', ['perencanaan', 'proses', 'selesai'])->default('perencanaan');
            $table->string('ikon')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progress_pembangunan');
    }
};