@extends('layouts.surat-pdf')

@section('title')
    Surat {{ strtoupper($pengajuan->jenisSurat->nama) }}
@endsection

@section('content')

@include('surat.partials.kop')
<table width="100%" style="margin-bottom: 20px; font-size: 12px;">
    <tr>
        <td width="50%">
            Nomor Surat: <strong>{{ $pengajuan->nomor_surat ?? '-' }}</strong>
        </td>
        <td width="50%" align="right">
            Tanggal: {{ $pengajuan->tanggal_surat?->translatedFormat('d F Y') }}
        </td>
    </tr>
</table>

@include('surat.partials.judul')

<div class="isi">
    @includeIf('surat.' . $pengajuan->jenisSurat->slug)
</div>

@include('surat.partials.ttd')

@endsection
