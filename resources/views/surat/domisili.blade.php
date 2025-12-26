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
        Adalah benar berdomisili dan bertempat tinggal di wilayah
        Desa Lamongan, Kecamatan Lamongan, Kabupaten Lamongan.
    </p>

    <p>
        Surat keterangan domisili ini dibuat untuk dipergunakan
        sebagaimana mestinya.
    </p>

    <p>
        Demikian surat keterangan ini dibuat dengan sebenarnya,
        untuk dapat digunakan sesuai keperluannya.
    </p>
</div>
