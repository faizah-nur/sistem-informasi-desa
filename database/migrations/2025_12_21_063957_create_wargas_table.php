<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();

            // Identitas utama
            $table->string('nik', 16)->unique();
            $table->string('nama_lengkap');

            // Data pribadi
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->integer('umur');

            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');

            // Domisili
            $table->text('alamat');
            $table->string('agama');
            $table->string('pekerjaan');

            // Kontak & status
            $table->string('no_hp');
            $table->string('status_pernikahan');

            // Kewarganegaraan
            $table->string('kewarganegaraan')->default('Indonesia');

            // Flag tambahan (opsional tapi berguna)
            $table->boolean('aktif')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};