<header style="background-image: url(https://banjaran.desa.id/assets/front/css/images/latar_website.jpg?v2fea19cb8b4f08ffe6b24e38cc2e0829);" class="top-0 left-0 right-0 bg-center bg-cover bg-no-repeat relative text-white">
    <div class="absolute bg-gray-800 bg-opacity-60 top-0 left-0 right-0 h-full">
    </div>
    <section class="relative z-10 text-center space-y-2 px-3 lg:px-5">
      <a href="{{ route('desa') }}">
        <figure>
          <img src="{{ asset('images/logo-b.png') }}" alt="Logo Desa Banjaran" class="h-20 mx-auto pb-2">
        </figure>
        <span class="text-h2 block">{{ config('app.name') }} </span>
        <p>Kec. Salem,
          Kab. Brebes,
          Provinsi 
          Jawa Tengah</p>
      </a>
      <!-- <marquee onmouseover="this.stop();" onmouseout="this.start();" scrollamount="4" class="block w-10/12 lg:w-1/4 mx-auto">
        <div class="grid grid-flow-col gap-3 shadow-lg pt-2">
          <span class="px-3">Kegiatan Posyandu - 12 Januari 2024</span>
          <span class="px-3">Gotong Royong Desa - 15 Januari 2024</span>
          <span class="px-3">Rapat Desa - 20 Januari 2024</span>
        </div> -->
      </marquee>
    </section>
    <div class="block px-3 bg-white text-white bg-opacity-20 py-1.5 text-xs mt-6 mb-0 z-20 relative">
      <marquee onmouseover="this.stop();" onmouseout="this.start();" class="block divide-x-4 relative">
        <span class="px-3">
          Selamat Datang di Website Resmi {{ config('app.name') }} Kecamatan Salem Kabupaten Brebes || Website Sistem Informasi Desa Merupakan Inovasi Dalam Pelayanan Dan Informasi Berbasis Digital Untuk Memudahkan Warga Desa Dan Masyarakat Dalam Mengakses Informasi {{ config('app.name') }}, Mendapatkan Pelayanan Prima Serta Keterbukaan Informasi Publik Yang Baik Dan Berkelanjutan || Kantor {{ config('app.name') }} membuka Pelayanan Publik Setiap Hari Kerja Senin s/d Jumat Pukul 08.00 - 16.00 Wib. Pastikan Nomor Induk Kependudukan (NIK) anda terdaftar di Sistem Informasi Desa.
        </span>
      </marquee>
    </div>
</header>