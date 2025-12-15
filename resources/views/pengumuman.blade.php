<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
<section class="w-full text-white py-16 px-6 md:px-12 flex items-center justify-center gap-8"> 
  <img class="max-w-52" src="/img/npc.png" alt="img">
  <div class="text-left max-w-xl">
    <h1 class="text-4xl md:text-5xl text-green-700 font-extrabold tracking-wide">
      Pengumuman Desa
    </h1>
    <p class="text-lg mt-4 text-amber-500">
      Informasi resmi dari pemerintah desa untuk seluruh warga. Tetap terhubung dengan update terbaru.
    </p>
    <ul class="flex gap-10 pt-5">
      <li>
            <a href="" class="text-sky-600"><i data-feather="map-pin"></i></a>
      </li>
      <li>
            <a href="" class="text-rose-500"
              ><i data-feather="instagram"></i
            ></a>
      </li>
      <li>
            <a href="" class="text-amber-400"><i data-feather="mail"></i></a>
      </li>
      <li>
            <a href="" class="text-green-400"
              ><i data-feather="message-square"></i
            ></a>
      </li>
    </ul>
  </div>
</section>

<section class="max-w-5xl mx-auto px-6 md:px-12 mt-10 grid gap-6">

  <!-- Item 1 -->
  <div class="p-5 text-lime-700 bg-green-100 shadow-[5px_5px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)]  transition">
    <div class="flex justify-between items-start">
      <h3 class="text-xl font-bold">Jadwal Posyandu Minggu Ini</h3>
      <span class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full">Jadwal</span>
    </div>
    <p class="text-gray-600 mt-2">
      Posyandu Balita dan Lansia akan dilaksanakan pada hari Jumat, 15 Desember 2025 di Balai Desa.
    </p>
    <div class="flex justify-between items-center mt-4">
      <span class="text-sm text-gray-500">Diposting: 12 Des 2025</span>
      <a href="#" class="text-green-700 font-semibold hover:underline">Lihat Detail</a>
    </div>
  </div>

  <!-- Item 2 -->
  <div class="p-5 text-lime-700 bg-green-100 shadow-[5px_5px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)]  transition">
    <div class="flex justify-between items-start">
      <h3 class="text-xl font-bold">PAM: Informasi Gangguan Air Bersih</h3>
      <span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full">Urgent</span>
    </div>
    <p class="text-gray-600 mt-2">
      Aliran air akan terhenti sementara pada 13–14 Desember 2025 karena perbaikan pipa utama.
    </p>
    <div class="flex justify-between items-center mt-4">
      <span class="text-sm text-gray-500">Diposting: 11 Des 2025</span>
      <a href="#" class="text-green-700 font-semibold hover:underline">Lihat Detail</a>
    </div>
  </div>

  <!-- Item 3 -->
  <div class="p-5 text-lime-700 bg-green-100 shadow-[5px_5px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)]  transition">
    <div class="flex justify-between items-start">
      <h3 class="text-xl font-bold">Penerimaan Bantuan Pangan 2025</h3>
      <span class="bg-yellow-100 text-yellow-700 text-xs px-3 py-1 rounded-full">Bantuan</span>
    </div>
    <p class="text-gray-600 mt-2">
      Warga yang masuk daftar KPM dapat mengambil bantuan pangan mulai tanggal 20 Des 2025 di Kantor Desa.
    </p>
    <div class="flex justify-between items-center mt-4">
      <span class="text-sm text-gray-500">Diposting: 10 Des 2025</span>
      <a href="#" class="text-green-700 font-semibold hover:underline">Lihat Detail</a>
    </div>
  </div>

</section>

</x-layout>