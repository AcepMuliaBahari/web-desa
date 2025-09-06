@extends('components.layout')

@section('content')
    <!-- Hero Section -->
    <div class="relative transition-all duration-500 ease-in-out 
    bg-gradient-to-r from-red-400 to-red-600 dark:from-red-700 dark:to-red-900 
    hover:brightness-110 ">

        <!-- Efek Pola -->
        <div class="absolute inset-0 opacity-10 dark:opacity-20 text-gray-800 dark:text-gray-300">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <pattern id="hero-pattern" width="10" height="10" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="1" fill="currentColor"/>
                </pattern>
                <rect width="100" height="100" fill="url(#hero-pattern)"/>
            </svg>
        </div>

        <!-- Konten -->
        <div class="container mx-auto px-4 py-10 relative">
            <div class="max-w-3xl animate-fade-up">
                <h2 class="text-5lg font-bold text-gray-900 dark:text-white mb-6">Sistem Pengaduan Desa</h2>
                <p class="text-lg text-gray-700 dark:text-red-200 leading-relaxed">
                    Layanan pengaduan desa yang memudahkan warga untuk menyampaikan keluhan, aspirasi, maupun laporan terkait pelayanan publik secara transparan, cepat, dan akuntabel.
                </p>
            </div>
        </div>

        <!-- Efek Gradient di Bawah -->
        <div class="absolute bottom-0 left-0 right-0 h-8 bg-gradient-to-t from-white dark:from-gray-900 to-transparent"></div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <!-- Apa Itu Pengaduan -->
        <section id="profil" class="mb-16">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">
                    <i class="fas fa-bullhorn text-red-600 dark:text-red-400 mr-3"></i>
                    Apa Itu Sistem Pengaduan Desa
                </h2>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        Sistem pengaduan desa adalah sarana resmi bagi masyarakat untuk menyampaikan masalah, keluhan, kritik, maupun saran yang berkaitan dengan pembangunan dan pelayanan desa. Pengaduan yang disampaikan akan diproses oleh petugas desa dan ditindaklanjuti sesuai dengan ketentuan.
                    </p>
                </div>
            </div>
        </section>

        

        <!-- Prosedur Pengaduan -->
        <section id="prosedur" class="mb-16">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">
                    <i class="fas fa-tasks text-red-600 dark:text-red-400 mr-3"></i>
                    Prosedur Pengaduan
                </h2>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="flex">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 dark:bg-red-900 flex items-center justify-center text-red-600 dark:text-red-400 text-xl font-bold">1</div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Mengisi Formulir</h4>
                            <p class="text-gray-600 dark:text-gray-400">Warga mengisi formulir pengaduan dengan data yang lengkap.</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 dark:bg-red-900 flex items-center justify-center text-red-600 dark:text-red-400 text-xl font-bold">2</div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Verifikasi</h4>
                            <p class="text-gray-600 dark:text-gray-400">Petugas desa memverifikasi pengaduan yang masuk.</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 dark:bg-red-900 flex items-center justify-center text-red-600 dark:text-red-400 text-xl font-bold">3</div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Tindak Lanjut</h4>
                            <p class="text-gray-600 dark:text-gray-400">Pengaduan ditindaklanjuti sesuai prosedur dan kewenangan.</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 dark:bg-red-900 flex items-center justify-center text-red-600 dark:text-red-400 text-xl font-bold">4</div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Hasil Pengaduan</h4>
                            <p class="text-gray-600 dark:text-gray-400">Warga mendapatkan informasi terkait hasil penanganan pengaduan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contoh Pengaduan -->
        <section id="contoh" class="mb-16">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">
                    <i class="fas fa-file-alt text-red-600 dark:text-red-400 mr-3"></i>
                    Contoh Pengaduan
                </h2>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
                    <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Judul: Jalan Rusak di RT 05</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-2">
                        Deskripsi: Jalan di RT 05 mengalami kerusakan parah sehingga menyulitkan akses kendaraan dan pejalan kaki. Mohon segera diperbaiki.
                    </p>
                    <p class="text-sm text-gray-500">Lampiran: Foto jalan rusak terlampir.</p>
                </div>
            </div>
        </section>

        

        <!-- Formulir Pengaduan -->
<section id="formulir" class="mb-16">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 flex items-center">
            <i class="fas fa-edit text-red-600 dark:text-red-400 mr-3"></i>
            Formulir Pengaduan
        </h2>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
            <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Identitas Pelapor -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Identitas Pelapor</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="reporter_name" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Nama Lengkap</label>
                            <input type="text" id="reporter_name" name="reporter_name" value="{{ old('reporter_name', auth()->user()->name ?? '') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @error('reporter_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Nomor Telepon / HP <span class="text-sm text-gray-500">(opsional)</span></label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="address" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Alamat / Dusun</label>
                            <textarea id="address" name="address" rows="3" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Detail Pengaduan -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Detail Pengaduan</h3>

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Judul Pengaduan</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Isi Pengaduan</label>
                        <textarea id="content" name="content" rows="4" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="complaint_type" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Jenis Pengaduan</label>
                            <select id="complaint_type" name="complaint_type" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="" disabled selected>Pilih jenis pengaduan</option>
                                <option value="infrastruktur" {{ old('complaint_type') == 'infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                                <option value="pelayanan" {{ old('complaint_type') == 'pelayanan' ? 'selected' : '' }}>Pelayanan</option>
                                <option value="sosial" {{ old('complaint_type') == 'sosial' ? 'selected' : '' }}>Sosial</option>
                                <option value="keamanan" {{ old('complaint_type') == 'keamanan' ? 'selected' : '' }}>Keamanan</option>
                                <option value="lingkungan" {{ old('complaint_type') == 'lingkungan' ? 'selected' : '' }}>Lingkungan</option>
                                <option value="kesehatan" {{ old('complaint_type') == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                                <option value="pendidikan" {{ old('complaint_type') == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                <option value="lainnya" {{ old('complaint_type') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('complaint_type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="incident_location" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Lokasi Kejadian</label>
                            <input type="text" id="incident_location" name="incident_location" value="{{ old('incident_location') }}" required
                                placeholder="Contoh: RT 01 RW 02, Dusun Sukamaju"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @error('incident_location')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="incident_date" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Tanggal Kejadian</label>
                            <input type="date" id="incident_date" name="incident_date" value="{{ old('incident_date') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @error('incident_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="incident_time" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Waktu Kejadian <span class="text-sm text-gray-500">(opsional)</span></label>
                            <input type="time" id="incident_time" name="incident_time" value="{{ old('incident_time') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @error('incident_time')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Lampiran -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Lampiran <span class="text-sm text-gray-500">(opsional)</span></h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="evidence_file" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Foto / Bukti Pendukung</label>
                            <input type="file" id="evidence_file" name="evidence_file" accept="image/*"
                                class="block w-full text-gray-700 dark:text-gray-300">
                            <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                            @error('evidence_file')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="document_file" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Dokumen Terkait</label>
                            <input type="file" id="document_file" name="document_file" accept=".pdf,.doc,.docx"
                                class="block w-full text-gray-700 dark:text-gray-300">
                            <p class="text-sm text-gray-500 mt-1">Format: PDF, DOC, DOCX. Maksimal 5MB</p>
                            @error('document_file')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="pt-4">
                    <button type="submit" class="w-full md:w-auto px-8 py-3 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 font-medium">
                        Kirim Pengaduan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>



<!-- Hubungi Kami -->
<section id="kontak" class="mb-16">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 flex items-center">
            <i class="fas fa-headset text-red-600 dark:text-red-400 mr-3"></i>
            Atau Bisa Hubungi Kami untuk Pengaduan
        </h2>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                Jika mengalami kendala atau membutuhkan bantuan terkait pengaduan, warga dapat langsung menghubungi perangkat desa melalui kontak berikut:
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- WhatsApp -->
                <a href="https://wa.me/6282326923524" target="_blank"
                   class="flex items-center space-x-3 p-3 rounded-lg border hover:bg-green-50 dark:hover:bg-green-900/30 transition">
                    <i class="fab fa-whatsapp text-green-500 text-2xl"></i>
                    <span class="text-gray-700 dark:text-gray-300">0823-2692-3524</span>
                </a>

                <a href="https://wa.me/6282329137637" target="_blank"
                   class="flex items-center space-x-3 p-3 rounded-lg border hover:bg-green-50 dark:hover:bg-green-900/30 transition">
                    <i class="fab fa-whatsapp text-green-500 text-2xl"></i>
                    <span class="text-gray-700 dark:text-gray-300">0823-2913-7637</span>
                </a>

                <!-- Facebook -->
                <a href="https://facebook.com/DesaPasirpanjang" target="_blank"
                   class="flex items-center space-x-3 p-3 rounded-lg border hover:bg-blue-50 dark:hover:bg-blue-900/30 transition">
                    <i class="fab fa-facebook text-blue-600 text-2xl"></i>
                    <span class="text-gray-700 dark:text-gray-300">Desa Pasirpanjang</span>
                </a>

                <!-- Twitter -->
                <a href="https://twitter.com/DsPasirpanjang" target="_blank"
                   class="flex items-center space-x-3 p-3 rounded-lg border hover:bg-sky-50 dark:hover:bg-sky-900/30 transition">
                    <i class="fab fa-twitter text-sky-500 text-2xl"></i>
                    <span class="text-gray-700 dark:text-gray-300">@DsPasirpanjang</span>
                </a>

                <!-- Gmail -->
                <a href="mailto:desapasirpanjang@gmail.com"
                   class="flex items-center space-x-3 p-3 rounded-lg border hover:bg-red-50 dark:hover:bg-red-900/30 transition">
                    <i class="fas fa-envelope text-red-500 text-2xl"></i>
                    <span class="text-gray-700 dark:text-gray-300">desapasirpanjang@gmail.com</span>
                </a>
            </div>
        </div>
    </div>
</section>


    </div>
@endsection
