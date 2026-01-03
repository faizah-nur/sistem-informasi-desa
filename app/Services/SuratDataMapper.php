<?php

namespace App\Services;

use Carbon\Carbon;

class SuratDataMapper
{
    public static function map($pengajuan)
    {
        // Pastikan relasi ter-load
        $pengajuan->loadMissing(['warga', 'jenisSurat', 'details']);

        $warga = $pengajuan->warga;

        if (!$warga) {
            throw new \Exception(
                'Data warga tidak ditemukan untuk pengajuan ID: ' . $pengajuan->id
            );
        }

        // ===============================
        // DETAIL SURAT (key => value)
        // ===============================
        $detailData = $pengajuan->details
            ->pluck('value', 'key')
            ->toArray();

        // ===============================
        // DATA UMUM (SEMUA SURAT)
        // ===============================
        $data = [
            'nama_lengkap' => $warga->nama_lengkap,
            'nik'          => $warga->nik,
            'ttl'          => $warga->tempat_lahir . ', ' .
                Carbon::parse($warga->tanggal_lahir)->translatedFormat('d F Y'),
            'jenis_kelamin' => $warga->jenis_kelamin === 'L'
                ? 'Laki-laki'
                : 'Perempuan',
            'umur'            => $warga->umur,
            'agama'           => $warga->agama,
            'status_pernikahan' => $warga->status_pernikahan,
            'pekerjaan'       => $warga->pekerjaan,
            'alamat'          => $warga->alamat,
            'kewarganegaraan' => $warga->kewarganegaraan,
        ];

        // ===============================
        // DATA KHUSUS BERDASARKAN JENIS SURAT
        // ===============================
        switch ($pengajuan->jenisSurat->slug) {

            case 'skck':
                $data['keperluan'] = $detailData['keperluan'] ?? '-';
                break;

            case 'domisili':
                $data['tujuan'] = $detailData['tujuan'] ?? '-';
                break;

            case 'sku':
                $data['nama_usaha'] = $detailData['nama_usaha'] ?? '-';
                break;

            case 'sktm':
                $data['pekerjaan'] = $detailData['pekerjaan']
                    ?? $warga->pekerjaan;
                break;
        }

        return $data;
    }
}