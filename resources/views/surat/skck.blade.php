<p class="text-justify">
    Yang bertanda tangan di bawah ini, Kepala Desa {{ config('desa.nama_desa') }},
    Kecamatan {{ config('desa.nama_kecamatan') }},
    Kabupaten {{ config('desa.nama_kabupaten') }},
    dengan ini menerangkan bahwa:
</p>

<table style="margin-left: 40px; margin-top: 10px;">
    <tr>
        <td style="width: 180px;">Nama Lengkap</td>
        <td>: {{ $data['nama_lengkap'] }}</td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>: {{ $data['nik'] }}</td>
    </tr>
    <tr>
        <td>Tempat / Tanggal Lahir</td>
        <td>: {{ $data['ttl'] }}</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>: {{ $data['jenis_kelamin'] }}</td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>: {{ $data['agama'] }}</td>
    </tr>
    <tr>
        <td>Status Perkawinan</td>
        <td>: {{ $data['status_pernikahan'] }}</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>: {{ $data['pekerjaan'] }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: {{ $data['alamat'] }}</td>
    </tr>
</table>

<p class="text-justify" style="margin-top: 10px;">
    Berdasarkan data dan pengamatan kami di lingkungan tempat tinggal yang bersangkutan,
    sampai dengan surat ini diterbitkan yang bersangkutan
    <strong>berkelakuan baik, tidak pernah terlibat tindak kriminal, dan tidak sedang
    tersangkut perkara hukum</strong>.
</p>

<p class="text-justify">
    Surat Keterangan ini dibuat untuk keperluan:
    <strong>{{ $data['keperluan'] }}</strong>.
</p>

<p class="text-justify">
    Demikian Surat Keterangan ini dibuat dengan sebenar-benarnya untuk dapat dipergunakan
    sebagaimana mestinya.
</p>
