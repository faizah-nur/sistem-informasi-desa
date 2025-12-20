<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }
        .center {
            text-align: center;
        }
        .line {
            border-bottom: 2px solid #000;
            margin: 10px 0;
        }
        table {
            width: 100%;
        }
        td {
            padding: 4px;
            vertical-align: top;
        }
    </style>
</head>
<body>

<h3 class="center">PEMERINTAH DESA</h3>
<h3 class="center">SURAT {{ strtoupper($pengajuan->jenisSurat->nama) }}</h3>

<div class="line"></div>

<p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>

<table>
    <tr>
        <td width="30%">Nama</td>
        <td>: {{ $pengajuan->user->name }}</td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>: {{ $pengajuan->data['nik'] ?? '-' }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: {{ $pengajuan->data['alamat'] ?? '-' }}</td>
    </tr>
</table>

<p>
    Surat ini dibuat untuk keperluan:
    <strong>{{ $pengajuan->keperluan }}</strong>
</p>

<br><br>

<table>
    <tr>
        <td width="60%"></td>
        <td class="center">
            {{ now()->translatedFormat('d F Y') }}<br>
            Kepala Desa<br><br><br>
            <strong>___________________</strong>
        </td>
    </tr>
</table>

</body>
</html>
