<?php

namespace App\Services;

use Carbon\Carbon;

class SuratDataMapper
{
    public static function map($pengajuan)
    {
        // ⛑️ AMAN: pastikan relasi ada
        if (!$pengajuan->relationLoaded('warga')) {
            $pengajuan->load('warga');
        }

        $warga = $pengajuan->warga;

        // ⛔ JIKA TIDAK ADA DATA WARGA
        if (!$warga) {
            throw new \Exception(
                'Data warga tidak ditemukan untuk pengajuan ID: ' . $pengajuan->id
            );
        }

        return [
            'nama_lengkap'      => $warga->nama_lengkap,
            'nik'               => $warga->nik,
            'ttl'               => $warga->tempat_lahir . ', ' .
                Carbon::parse($warga->tanggal_lahir)->translatedFormat('d F Y'),
            'jenis_kelamin'     => $warga->jenis_kelamin === 'L'
                ? 'Laki-laki'
                : 'Perempuan',
            'umur'              => $warga->umur,
            'agama'             => $warga->agama,
            'status_pernikahan' => $warga->status_pernikahan,
            'pekerjaan'         => $warga->pekerjaan,
            'alamat'            => $warga->alamat,
            'kewarganegaraan'   => $warga->kewarganegaraan,
            'keperluan'         => $pengajuan->keperluan ?? '-',
        ];
    }
}