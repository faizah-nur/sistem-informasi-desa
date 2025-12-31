@php
    $details = $pengajuan->details->pluck('value', 'key');
@endphp

<div class="isi">
    <p>
        Yang bertanda tangan di bawah ini, Kepala Desa {{ config('desa.nama_desa') }},
        Kecamatan {{ config('desa.nama_kecamatan') }},
        Kabupaten {{ config('desa.nama_kabupaten') }},
        dengan ini menerangkan bahwa:
    </p>

    {{-- IDENTITAS WARGA --}}
    <table width="100%" cellpadding="4" cellspacing="0">
        <tr>
            <td width="35%">Nama Lengkap</td>
            <td width="5%">:</td>
            <td>{{ $data['nama_lengkap'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $data['nik'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Tempat / Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $data['ttl'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $data['pekerjaan'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $data['alamat'] ?? '-' }}</td>
        </tr>
    </table>

    <p style="margin-top: 10px;">
        Berdasarkan keterangan dan data yang ada pada kami,
        yang bersangkutan benar memiliki dan menjalankan usaha sebagai berikut:
    </p>

    {{-- DATA USAHA --}}
    <table width="100%" cellpadding="4" cellspacing="0">
        <tr>
            <td width="35%">Nama Usaha</td>
            <td width="5%">:</td>
            <td>{{ $details['nama_usaha'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Jenis Usaha</td>
            <td>:</td>
            <td>{{ $details['jenis_usaha'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Alamat Usaha</td>
            <td>:</td>
            <td>{{ $details['alamat_usaha'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Lama Usaha</td>
            <td>:</td>
            <td>{{ $details['lama_usaha'] ?? '-' }}</td>
        </tr>
    </table>

    <p>
        Surat Keterangan Usaha ini dibuat untuk keperluan:
        <strong>{{ $details['keperluan'] ?? 'administrasi usaha' }}</strong>.
    </p>

    <p>
        Demikian Surat Keterangan Usaha ini dibuat dengan sebenarnya,
        agar dapat dipergunakan sebagaimana mestinya.
    </p>
</div>
