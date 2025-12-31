@php
    $details = $pengajuan->details->pluck('value', 'key');
@endphp

<p class="text-justify">
    Yang bertanda tangan di bawah ini, Kepala Desa {{ config('desa.nama_desa') }},
    Kecamatan {{ config('desa.nama_kecamatan') }},
    Kabupaten {{ config('desa.nama_kabupaten') }},
    dengan ini menerangkan bahwa:
</p>

<table width="100%" cellpadding="4" cellspacing="0">
    <tr>
        <td width="35%">Nama Lengkap</td>
        <td width="5%">:</td>
        <td>{{ $data['nama_lengkap'] }}</td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td>{{ $data['nik'] }}</td>
    </tr>
    <tr>
        <td>Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $data['ttl'] }}</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $data['jenis_kelamin'] }}</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>{{ $data['pekerjaan'] }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $data['alamat'] }}</td>
    </tr>
</table>

<p class="text-justify">
    Berdasarkan data yang ada pada kami, yang bersangkutan benar
    <strong>berdomisili dan bertempat tinggal</strong> di alamat tersebut di atas.
</p>

<p class="text-justify">
    Surat Keterangan Domisili ini dibuat untuk keperluan:
    <strong>{{ $details['keperluan'] ?? '-' }}</strong>.
</p>

<p class="text-justify">
    Demikian surat keterangan ini dibuat dengan sebenarnya untuk
    dipergunakan sebagaimana mestinya.
</p>
