@extends('layouts.surat-pdf')

@section('title')
    Surat {{ strtoupper($pengajuan->jenisSurat->nama) }}
@endsection

@section('content')

@include('surat.partials.kop')
@include('surat.partials.judul')

<div class="isi">
    @includeIf('surat.' . $pengajuan->jenisSurat->slug)
</div>

@include('surat.partials.ttd')

@endsection
