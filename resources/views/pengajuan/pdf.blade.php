<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat {{ strtoupper($pengajuan->jenisSurat->nama) }}</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
        }

        .kop {
            width: 100%;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .kop-table {
            width: 100%;
        }

        .kop-logo {
            width: 90px;
        }

        .kop-text {
            text-align: center;
        }

        .kop-text h1 {
            font-size: 16pt;
            margin: 0;
        }

        .kop-text h2 {
            font-size: 14pt;
            margin: 0;
        }

        .kop-text p {
            font-size: 10pt;
            margin: 2px 0;
        }

        .judul {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .judul h3 {
            text-decoration: underline;
            margin-bottom: 5px;
        }

        .isi {
            margin-top: 20px;
            text-align: justify;
        }

        .ttd {
            width: 100%;
            margin-top: 40px;
        }

        .ttd-kanan {
            width: 40%;
            float: right;
            text-align: center;
        }
    </style>
</head>
<body>

{{-- ================= KOP SURAT ================= --}}
<div class="kop">
    <table class="kop-table">
        <tr>
            <td class="kop-logo">
                <img src="{{ public_path('img/logounisla.png') }}" width="80">
            </td>
            <td class="kop-text">
                <h1>PEMERINTAHAN DESA LAMONGAN</h1>
                <h2>KECAMATAN LAMONGAN</h2>
                <h2>KABUPATEN LAMONGAN</h2>
                <p>
                    Jl. Raya Lamongan No. 12, Kecamatan Lamongan, Kabupaten Lamongan <br>
                    Telp: 081334125113
                </p>
            </td>
        </tr>
    </table>
</div>

{{-- ================= JUDUL SURAT ================= --}}
<div class="judul">
    <h3>SURAT KETERANGAN</h3>
    <p>Nomor: {{ $pengajuan->id }}/{{ strtoupper($pengajuan->jenisSurat->slug) }}/{{ date('Y') }}</p>
</div>

{{-- ================= ISI SURAT ================= --}}
<div class="isi">

@switch($pengajuan->jenisSurat->slug)

{{-- ===================== SKCK ===================== --}}
@case('skck')

<p>
        Yang bertanda tangan di bawah ini Kepala Desa Lamongan, Kecamatan Lamongan,
    Kabupaten Lamongan, menerangkan bahwa:
</p>

<table width="100%" cellpadding="4">
@foreach ($pengajuan->details as $d)
<tr>
    <td width="30%">{{ ucfirst(str_replace('_',' ', $d->key)) }}</td>
    <td width="5%">:</td>
    <td>{{ $d->value }}</td>
</tr>
@endforeach
</table>

<p>
        Berdasarkan keterangan dan data yang ada, nama tersebut di atas benar-benar
    warga Desa Lamongan dan berkelakuan baik serta tidak pernah terlibat
    tindak pidana kriminal.
</p>

<p>
    Surat keterangan ini dibuat sebagai **persyaratan pengurusan SKCK**.
</p>
@break


{{-- ===================== DOMISILI ===================== --}}
@case('domisili')
<p>
    Dengan ini Pemerintahan Desa Lamongan menerangkan bahwa:
</p>

<table width="100%" cellpadding="4">
@foreach ($pengajuan->details as $d)
<tr>
    <td width="30%">{{ ucfirst(str_replace('_',' ', $d->key)) }}</td>
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
    Surat keterangan domisili ini dipergunakan untuk
    keperluan sebagaimana mestinya.
</p>
@break


{{-- ===================== SKU ===================== --}}
@case('sku')
<p>
    Pemerintahan Desa Lamongan menerangkan bahwa:
</p>

<table width="100%" cellpadding="4">
@foreach ($pengajuan->details as $d)
<tr>
    <td width="30%">{{ ucfirst(str_replace('_',' ', $d->key)) }}</td>
    <td width="5%">:</td>
    <td>{{ $d->value }}</td>
</tr>
@endforeach
</table>

<p>
    Benar yang bersangkutan memiliki dan menjalankan usaha
    sebagaimana tersebut di atas dan berlokasi di wilayah
    Desa Lamongan.
</p>

<p>
    Surat Keterangan Usaha ini digunakan sebagai
    **persyaratan administrasi usaha**.
</p>
@break


{{-- ===================== SKTM ===================== --}}
@case('sktm')
<p>
    Yang bertanda tangan di bawah ini Kepala Desa Lamongan
    menerangkan bahwa:
</p>

<table width="100%" cellpadding="4">
@foreach ($pengajuan->details as $d)
<tr>
    <td width="30%">{{ ucfirst(str_replace('_',' ', $d->key)) }}</td>
    <td width="5%">:</td>
    <td>{{ $d->value }}</td>
</tr>
@endforeach
</table>

<p>
    Berdasarkan pengamatan dan data yang ada,
    yang bersangkutan tergolong keluarga kurang mampu.
</p>

<p>
    Surat Keterangan Tidak Mampu ini dibuat untuk
    keperluan administrasi yang sah.
</p>
@break


{{-- ===================== DEFAULT ===================== --}}
@default
<p>Jenis surat tidak dikenali.</p>

@endswitch

</div>


{{-- ================= TANDA TANGAN ================= --}}
<div class="ttd">
    <div class="ttd-kanan">
        <p>Lamongan, {{ date('d M Y') }}</p>
        <p>Kepala Desa Lamongan</p>
        <br><br><br>
        <p><strong>( ____________________ )</strong></p>
    </div>
</div>

</body>
</html>
