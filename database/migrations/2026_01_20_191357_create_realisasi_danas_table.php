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
        Schema::create('realisasi_danas', function (Blueprint $table) {
    $table->id();
    $table->foreignId('program_desa_id')->constrained()->cascadeOnDelete();
    $table->date('tanggal');
    $table->bigInteger('jumlah');
    $table->text('keterangan')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisasi_danas');
    }
};