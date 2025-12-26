<div class="isi">
    <p>
        Yang bertanda tangan di bawah ini Kepala Desa Lamongan,
        Kecamatan Lamongan, Kabupaten Lamongan, dengan ini menerangkan bahwa:
    </p>

    <table width="100%" cellpadding="4" cellspacing="0">
        @foreach ($pengajuan->details as $d)
        <tr>
            <td width="35%">{{ ucfirst(str_replace('_',' ', $d->key)) }}</td>
            <td width="5%">:</td>
            <td>{{ $d->value }}</td>
        </tr>
        @endforeach
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
