<?php

namespace App\Services;

use App\Models\PengajuanSurat;
use Illuminate\Support\Facades\DB;

class GenerateNomorSurat
{
    public static function make(PengajuanSurat $pengajuan): string
    {
        return DB::transaction(function () use ($pengajuan) {

            // 🔒 Kunci baris pengajuan
            $pengajuan = PengajuanSurat::lockForUpdate()
                ->findOrFail($pengajuan->id);

            // Jika sudah punya nomor → jangan buat ulang
            if ($pengajuan->nomor_surat) {
                return $pengajuan->nomor_surat;
            }

            // 🔢 Hitung nomor terakhir tahun ini
            $lastNumber = PengajuanSurat::whereYear('tanggal_surat', now()->year)
                ->whereNotNull('nomor_surat')
                ->lockForUpdate()
                ->count();

            $nomorUrut = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

            $kodeSurat = strtoupper($pengajuan->jenisSurat->kode); // SKU, SKTM, dll
            $bulanRomawi = self::toRomawi(now()->month);
            $tahun = now()->year;

            return "470/{$nomorUrut}/{$kodeSurat}/{$bulanRomawi}/{$tahun}";
        });
    }

    private static function toRomawi($bulan)
    {
        return [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV',
            5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII',
            9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII',
        ][$bulan];
    }
}