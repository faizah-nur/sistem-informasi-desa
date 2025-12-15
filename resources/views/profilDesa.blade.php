<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="relative w-full h-[80vh] md:h-screen overflow-hidden">
  
  <!-- Background Video -->
  <video 
    class="absolute inset-0 w-full h-full object-cover"
    autoplay 
    muted 
    loop 
    playsinline
  >
    <source src="/img/drown.mp4" type="video/mp4" />
  </video>

  <!-- Text Content -->
  <div class="relative z-10 flex flex-col items-center justify-center text-center h-full px-6">
    <h1 class="text-4xl md:text-6xl font-extrabold text-white drop-shadow-lg">
      Potret Desa Lamongan
    </h1>
    <p class="mt-4 text-lg md:text-2xl text-gray-200 max-w-2xl">
      Menyajikan gambaran lengkap tentang identitas, potensi, dan perkembangan desa kami.
    </p>
  </div>

</section>

{{-- Gambaran unum --}}
<section class="py-20 px-6 md:px-12 mx-auto md:flex justify-center gap-5">
  <img class="max-w-92" src="/img/about.jpeg" alt="img">
  <div class="content">
  <h2 class="text-3xl font-bold text-green-700 mb-6">Gambaran Umum Desa</h2>
  <p class="text-gray-700 leading-relaxed text-lg">
    Desa Sukamaju merupakan desa yang terletak di wilayah Kecamatan XX, Kabupaten XX. 
    Desa ini memiliki luas wilayah sekitar 350 Ha yang terdiri dari area pemukiman, 
    persawahan, perkebunan, serta ruang hijau. Dengan jumlah penduduk sekitar 2.500 jiwa, 
    masyarakat desa hidup dengan harmonis dan memiliki kegiatan ekonomi utama di bidang 
    pertanian dan UMKM.
  </p>
  </div>
</section>

{{-- Visi misi --}}
<section class="py-20 bg-green-50 px-6 md:px-12">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-green-700 mb-10">Visi & Misi Desa</h2>
    
    <div class="grid md:grid-cols-2 gap-10">

      <!-- Visi -->
      <div class="bg-white shadow-md p-8 rounded-xl border-l-8 border-green-700">
        <h3 class="text-2xl font-semibold text-green-700 mb-4">Visi</h3>
        <p class="text-gray-700 text-lg">
          “Mewujudkan Desa Sukamaju yang Mandiri, Sejahtera, dan Berdaya Saing.”
        </p>
      </div>

      <!-- Misi -->
      <div class="bg-white shadow-md p-8 rounded-xl border-l-8 border-green-700">
        <h3 class="text-2xl font-semibold text-green-700 mb-4">Misi</h3>
        <ul class="space-y-3 text-gray-700 text-lg">
          <li>• Meningkatkan kualitas pelayanan kepada masyarakat.</li>
          <li>• Mengembangkan potensi ekonomi desa.</li>
          <li>• Meningkatkan sarana prasarana desa.</li>
          <li>• Memberdayakan masyarakat melalui pelatihan dan UMKM.</li>
          <li>• Menciptakan lingkungan desa yang bersih dan hijau.</li>
        </ul>
      </div>

    </div>
  </div>
</section>

{{-- Sejarah desa --}}
<section class="py-20 px-6 md:px-12 max-w-6xl mx-auto">
  <h2 class="text-3xl font-bold text-green-700 mb-6">Sejarah Desa</h2>
  <p class="text-gray-700 text-lg leading-relaxed">
    Desa Sukamaju berdiri pada tahun 1950 dan merupakan salah satu desa tertua 
    di wilayah Kecamatan XX. Pada masa awal berdiri, penduduk desa mayoritas bekerja 
    sebagai petani dan peternak. Perkembangan desa semakin pesat setelah pembangunan 
    infrastruktur jalan utama pada tahun 1990 yang membuka akses perdagangan dan ekonomi.
  </p>
</section>

{{-- Setruktur pemerintahan --}}
<section class="py-20 bg-green-50 px-6 md:px-12">
  <h2 class="text-3xl font-bold text-green-700 mb-10 text-center">Struktur Pemerintahan Desa</h2>

  <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">

    <div class="bg-green-100 shadow-[5px_5px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)]  transition p-6 text-center">
      <img src="/img/user.png" class="mx-auto w-28 h-28 rounded-full object-cover">
      <h3 class="text-xl font-semibold text-green-700 mt-4">Kepala Desa</h3>
      <p class="text-gray-600 mt-1">Nama Kepala Desa</p>
    </div>

    <div class="bg-green-100 shadow-[5px_5px_30px_rgba(0,255,0,0.35)]  hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)]  transition rounded-xl p-6 text-center">
      <img src="/img/user.png" class="mx-auto w-28 h-28 rounded-full object-cover">
      <h3 class="text-xl font-semibold text-green-700 mt-4">Sekretaris Desa</h3>
      <p class="text-gray-600 mt-1">Nama Sekretaris</p>
    </div>

    <!-- Tambahkan perangkat desa lainnya sesuai kebutuhan -->
  </div>
</section>

{{-- Desa demografi --}}
<section class="py-20 px-6 md:px-12 max-w-6xl mx-auto">
  <h2 class="text-3xl font-bold text-green-700 mb-6">Data Demografi Penduduk</h2>

  <div class="grid md:grid-cols-3 gap-8">

    <div class="bg-green-100 p-6 rounded-xl text-center shadow-md">
      <h3 class="text-4xl font-bold text-green-700">2.500</h3>
      <p class="text-gray-700 mt-2">Total Penduduk</p>
    </div>

    <div class="bg-green-100 p-6 rounded-xl text-center shadow-md">
      <h3 class="text-4xl font-bold text-green-700">1.260</h3>
      <p class="text-gray-700 mt-2">Laki-Laki</p>
    </div>

    <div class="bg-green-100 p-6 rounded-xl text-center shadow-md">
      <h3 class="text-4xl font-bold text-green-700">1.240</h3>
      <p class="text-gray-700 mt-2">Perempuan</p>
    </div>

  </div>
</section>

</x-layout>