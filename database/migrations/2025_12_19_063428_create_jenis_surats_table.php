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
    Schema::create('jenis_surats', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('slug')->unique();
        $table->string('kode', 10)->unique(); // SKU, SKTM, SKCK, dll
        $table->text('deskripsi')->nullable();
        $table->boolean('aktif')->default(true);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_surats');
    }
};