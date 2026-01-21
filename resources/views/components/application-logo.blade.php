{{-- <img 
    src="{{ asset('img/logounisla.png') }}" 
    alt="Logo UNISLA"
    class="w-auto h-24 mx-auto transition-transform duration-300 hover:scale-105"
/> --}}
@php
    use App\Models\Setting;
    $logo = Setting::get('site_logo');
@endphp

@if ($logo)
    <img src="{{ asset('storage/'.$logo) }}"
         alt="Logo"
         class="w-20 h-20">
@else
    <span class="text-xl font-bold">DESA</span>
@endif
