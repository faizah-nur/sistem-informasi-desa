@extends('admin.layouts.app')

@section('title', 'Detail Kontak')

@section('content')
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Detail Pesan
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white shadow rounded-lg">
        <p><b>Nama:</b> {{ $kontakPesan->nama }}</p>
        <p><b>Email:</b> {{ $kontakPesan->email }}</p>
        <hr class="my-4">
        <p>{{ $kontakPesan->pesan }}</p>
    </div>
@endsection
