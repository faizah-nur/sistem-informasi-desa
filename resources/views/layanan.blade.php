<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

<div x-data="{ active: 'skck' }">  <!-- STATE DI SINI -->

<!-- HERO -->
<section class="text-green-700 py-16 px-6 md:px-12 text-center">
  <h1 class="text-4xl md:text-5xl font-extrabold tracking-wide">Layanan Desa</h1>
  <p class="text-lg mt-4 text-lime-500 max-w-2xl mx-auto">
    Ajukan berbagai kebutuhan administrasi desa secara online. Mudah, cepat, dan transparan.
  </p>
</section>

<!-- MENU KARTU -->
<section class="max-w-6xl mx-auto px-6 md:px-12 py-14 
                grid md:grid-cols-2 lg:grid-cols-4 gap-8">

  <!-- SKCK -->
  <a @click="active = 'skck'"
     :class="active === 'skck' ? 'bg-green-500 text-white shadow-[10px_10px_30px_rgba(0,255,0,0.5)]' : 'bg-green-100 text-lime-700'"
     class="text-center cursor-pointer
            shadow-[5px_5px_30px_rgba(0,255,0,0.35)]
            rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] transition p-2">
    <img class="max-w-20 mx-auto" src="/img/skck.png" alt="img">
    <h3 class="text-xl font-semibold">Surat Pengantar SKCK</h3>
    <p class="text-gray-600 mt-2" :class="active === 'skck' ? 'text-white' : ''">Pengajuan online untuk pembuatan SKCK di kepolisian.</p>
  </a>

  <!-- Domisili -->
  <a @click="active = 'domisili'"
     :class="active === 'domisili' ? 'bg-green-500 text-white shadow-[10px_10px_30px_rgba(0,255,0,0.5)]' : 'bg-green-100 text-lime-700'"
     class="text-center cursor-pointer
            shadow-[5px_5px_30px_rgba(0,255,0,0.35)]
            rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] transition p-2">
    <img class="max-w-20 mx-auto" src="/img/keteranganDomisili.png" alt="img">
    <h3 class="text-xl font-semibold">Surat Keterangan Domisili</h3>
    <p class="text-gray-600 mt-2" :class="active === 'domisili' ? 'text-white' : ''">Untuk keperluan administrasi atau kebutuhan resmi lainnya.</p>
  </a>

  <!-- SKTM -->
  <a @click="active = 'sktm'"
     :class="active === 'sktm' ? 'bg-green-500 text-white shadow-[10px_10px_30px_rgba(0,255,0,0.5)]' : 'bg-green-100 text-lime-700'"
     class="text-center cursor-pointer
            shadow-[5px_5px_30px_rgba(0,255,0,0.35)]
            rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] transition p-2">
    <img class="max-w-20 mx-auto" src="/img/sktm.png" alt="img">
    <h3 class="text-xl font-semibold">Surat Keterangan Tidak Mampu (SKTM)</h3>
    <p class="text-gray-600 mt-2" :class="active === 'sktm' ? 'text-white' : ''">Pengajuan SKTM untuk pendidikan, kesehatan, atau bantuan.</p>
  </a>

  <!-- SKU -->
  <a @click="active = 'sku'"
     :class="active === 'sku' ? 'bg-green-500 text-white shadow-[10px_10px_30px_rgba(0,255,0,0.5)]' : 'bg-green-100 text-lime-700'"
     class="text-center cursor-pointer
            shadow-[5px_5px_30px_rgba(0,255,0,0.35)]
            rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] transition p-2">
    <img class="max-w-20 mx-auto" src="/img/keteranganKerja.png" alt="img">
    <h3 class="text-xl font-semibold">Surat Keterangan Usaha</h3>
    <p class="text-gray-600 mt-2" :class="active === 'sku' ? 'text-white' : ''">Layanan untuk warga yang ingin mengurus SKU.</p>
  </a>

</section>


{{-- SKCK --}}
<section x-show="active === 'skck'" x-transition
         class="max-w-4xl mx-auto px-6 md:px-12 py-14">

  <h2 class="text-3xl font-bold text-green-700">Surat Pengantar SKCK</h2>
  <p class="mt-2 text-gray-600">
    Layanan untuk membuat surat pengantar SKCK untuk mengurus SKCK di Kepolisian.
  </p>

  <div class="mt-8 text-lime-700 text-center bg-green-100
              shadow-[5px_5px_30px_rgba(0,255,0,0.35)] p-6">
    <h3 class="text-xl font-semibold mb-4">Syarat Pengajuan</h3>
    <ul class="space-y-2 text-gray-700">
      <li>• Fotokopi KTP / KK</li>
      <li>• Pas foto 4x6 (background merah)</li>
      <li>• Mengisi formulir online</li>
    </ul>
  </div>

  <form class="mt-8 bg-white border rounded-xl shadow-md p-6 space-y-5">
    <div>
      <label class="font-semibold text-green-700">Nama Lengkap</label>
      <input type="text" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2">
    </div>

    <div>
      <label class="font-semibold text-green-700">NIK</label>
      <input type="text" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2">
    </div>

    <div>
      <label class="font-semibold text-green-700">Alamat</label>
      <textarea rows="3" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2"></textarea>
    </div>

    <div>
      <label class="font-semibold text-green-700">Upload Berkas Pendukung</label>
      <input type="file" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2">
    </div>

    <button class="bg-green-700 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition font-semibold w-full">
      Ajukan Permohonan
    </button>
  </form>
</section>

{{-- DOMISILI --}}
<section x-show="active === 'domisili'" x-transition 
         class="max-w-4xl mx-auto px-6 md:px-12 py-14">

  <h2 class="text-3xl font-bold text-green-700">Surat Keterangan Domisili</h2>
  <p class="mt-2 text-gray-600">
    Layanan untuk membuat surat domisili sebagai bukti tempat tinggal untuk keperluan administrasi.
  </p>

  <!-- Syarat -->
  <div class="mt-8 text-lime-700 text-center bg-green-100
              shadow-[5px_5px_30px_rgba(0,255,0,0.35)] p-6">
    <h3 class="text-xl font-semibold mb-4">Syarat Pengajuan</h3>
    <ul class="space-y-2 text-gray-700">
      <li>• Fotokopi KTP / KK</li>
      <li>• Pengantar RT/RW</li>
      <li>• Mengisi formulir online</li>
    </ul>
  </div>

  <!-- Form -->
  <form class="mt-8 bg-white border rounded-xl shadow-md p-6 space-y-5">

    <div>
      <label class="font-semibold text-green-700">Nama Lengkap</label>
      <input type="text" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2">
    </div>

    <div>
      <label class="font-semibold text-green-700">NIK</label>
      <input type="text" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2">
    </div>

    <div>
      <label class="font-semibold text-green-700">Alamat Tinggal Sekarang</label>
      <textarea rows="3" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2"></textarea>
    </div>

    <div>
      <label class="font-semibold text-green-700">Upload Berkas Pendukung</label>
      <input type="file" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2">
    </div>

    <button class="bg-green-700 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition font-semibold w-full">
      Ajukan Permohonan
    </button>

  </form>
</section>

{{-- SKU --}}
<section x-show="active === 'sku'" x-transition 
         class="max-w-4xl mx-auto px-6 md:px-12 py-14">

  <h2 class="text-3xl font-bold text-green-700">Surat Keterangan Usaha (SKU)</h2>
  <p class="mt-2 text-gray-600">
    Layanan bagi warga yang ingin mengurus SKU untuk keperluan perizinan usaha atau administrasi lainnya.
  </p>

  <!-- Syarat -->
  <div class="mt-8 text-lime-700 text-center bg-green-100
              shadow-[5px_5px_30px_rgba(0,255,0,0.35)] p-6">
    <h3 class="text-xl font-semibold mb-4">Syarat Pengajuan</h3>
    <ul class="space-y-2 text-gray-700">
      <li>• Fotokopi KTP / KK</li>
      <li>• Bukti usaha (foto lokasi / surat keterangan RT/RW)</li>
      <li>• Mengisi formulir online</li>
    </ul>
  </div>

  <!-- Form -->
  <form class="mt-8 bg-white border rounded-xl shadow-md p-6 space-y-5">

    <div>
      <label class="font-semibold text-green-700">Nama Pemilik Usaha</label>
      <input type="text" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2">
    </div>

    <div>
      <label class="font-semibold text-green-700">Nama Usaha</label>
      <input type="text" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2">
    </div>

    <div>
      <label class="font-semibold text-green-700">Alamat Usaha</label>
      <textarea rows="3" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2"></textarea>
    </div>

    <div>
      <label class="font-semibold text-green-700">Upload Foto / Dokumen Pendukung</label>
      <input type="file" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2">
    </div>

    <button class="bg-green-700 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition font-semibold w-full">
      Ajukan Permohonan
    </button>

  </form>
</section>

{{-- SKTM --}}
<section x-show="active === 'sktm'" x-transition 
         class="max-w-4xl mx-auto px-6 md:px-12 py-14">

  <h2 class="text-3xl font-bold text-green-700">Surat Keterangan Tidak Mampu (SKTM)</h2>
  <p class="mt-2 text-gray-600">
    Layanan untuk membuat surat keterangan tidak mampu untuk keperluan pendidikan, kesehatan, atau bantuan sosial lainnya.
  </p>

  <!-- Syarat -->
  <div class="mt-8 text-lime-700 text-center bg-green-100
              shadow-[5px_5px_30px_rgba(0,255,0,0.35)] p-6">
    <h3 class="text-xl font-semibold mb-4">Syarat Pengajuan</h3>
    <ul class="space-y-2 text-gray-700">
      <li>• Fotokopi KTP / KK</li>
      <li>• Bukti penghasilan (surat keterangan RT/RW tentang kondisi ekonomi)</li>
      <li>• Mengisi formulir online</li>
    </ul>
  </div>

  <!-- Form -->
  <form class="mt-8 bg-white border rounded-xl shadow-md p-6 space-y-5">

    <div>
      <label class="font-semibold text-green-700">Nama Lengkap</label>
      <input type="text" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2">
    </div>

    <div>
      <label class="font-semibold text-green-700">NIK</label>
      <input type="text" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2">
    </div>

    <div>
      <label class="font-semibold text-green-700">Alamat</label>
      <textarea rows="3" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2"></textarea>
    </div>

    <div>
      <label class="font-semibold text-green-700">Keperluan Surat</label>
      <select class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2">
        <option>Pilih Keperluan</option>
        <option>Pendidikan</option>
        <option>Kesehatan</option>
        <option>Bantuan Sosial</option>
        <option>Lainnya</option>
      </select>
    </div>

    <div>
      <label class="font-semibold text-green-700">Upload Berkas Pendukung</label>
      <input type="file" class="w-full border border-lime-500 px-4 py-2 rounded-lg mt-2">
    </div>

    <button class="bg-green-700 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition font-semibold w-full">
      Ajukan Permohonan
    </button>

  </form>
</section>

</div>

</x-layout>
