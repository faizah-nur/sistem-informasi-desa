<div class="isi">
    <p>
        Yang bertanda tangan di bawah ini Kepala Desa {{ config('desa.nama_desa') }},
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

    <p>
        Berdasarkan pengamatan dan data yang ada pada kami,
        yang bersangkutan benar tergolong sebagai
        <strong>keluarga kurang mampu</strong>.
    </p>

    <p>
        Surat Keterangan Tidak Mampu ini dibuat untuk
        keperluan administrasi yang sah.
    </p>

    <p>
        Demikian surat keterangan ini dibuat dengan sebenarnya,
        agar dapat dipergunakan sebagaimana mestinya.
    </p>
</div>
