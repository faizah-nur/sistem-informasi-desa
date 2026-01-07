<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengajuan_messages', function (Blueprint $table) {
            $table->id();

            // relasi ke pengajuan surat
            $table->foreignId('pengajuan_surat_id')
                ->constrained()
                ->cascadeOnDelete();

            // siapa yang mengirim pesan
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // isi pesan
            $table->text('pesan');

            // role pengirim (penting!)
            $table->enum('sender_role', ['admin', 'warga']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_messages');
    }
};