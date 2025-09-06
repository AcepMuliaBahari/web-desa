@extends('components.layout')

@section('content')
    <!-- Hero Section -->
    <div class="relative transition-all duration-500 ease-in-out 
    bg-gradient-to-r from-green-400 to-green-600 dark:from-green-700 dark:to-green-900 
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
            <h2 class="text-5lg font-bold text-gray-900 dark:text-white mb-6">PPID Desa</h1>
            <p class="text-lg text-gray-700 dark:text-green-200 leading-relaxed">
                Pejabat Pengelola Informasi dan Dokumentasi Desa - Mewujudkan keterbukaan informasi publik yang transparan dan akuntabel sesuai dengan UU No. 14 Tahun 2008.
            </p>
        </div>
    </div>

    <!-- Efek Gradient di Bawah -->
    <div class="absolute bottom-0 left-0 right-0 h-8 bg-gradient-to-t from-white dark:from-gray-900 to-transparent"></div>
</div>


    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <!-- Profil PPID -->
        <section id="profil" class="mb-16">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">
                    <i class="fas fa-user-tie text-blue-600 dark:text-blue-400 mr-3"></i>
                    APA Itu PPID
                 </h2>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        Pejabat Pengelola Informasi dan Dokumentasi Desa (PPID Desa) adalah pejabat yang bertanggung jawab di bidang penyimpanan, pendokumentasian, penyediaan, dan/atau pelayanan Informasi Publik Desa. PPID Desa ditunjuk oleh Kepala Desa dan ditetapkan dengan Surat Keputusan Kepala Desa.
                    </p>
                </div>
            </div>
        </section>

        <!-- Dasar Hukum -->
        <section id="dasar-hukum" class="mb-16">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">
                    <i class="fas fa-gavel text-blue-600 dark:text-blue-400 mr-3"></i>
                    Dasar Hukum
                </h2>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
                    <div class="space-y-6">
                        <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">
                                UU No. 14 Tahun 2008
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400">
                                Tentang Keterbukaan Informasi Publik
                            </p>
                        </div>
                        <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">
                                UU No. 6 Tahun 2014
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400">
                                Tentang Desa
                            </p>
                        </div>
                        <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">
                                Perki No. 1 Tahun 2010
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400">
                                Tentang Standar Layanan Informasi Publik
                            </p>
                        </div>
                        <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">
                                Perki No. 1 Tahun 2018
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400">
                                Tentang Standar Layanan Informasi Publik Desa
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tugas dan Wewenang -->
        <section id="tugas" class="mb-16">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">
                    <i class="fas fa-tasks text-blue-600 dark:text-blue-400 mr-3"></i>
                    Tugas dan Wewenang
                </h2>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
                    <div class="prose dark:prose-invert max-w-none">
                        <h3 class="text-xl font-bold mb-4">Tugas dan Tanggung Jawab:</h3>
                        <ul class="space-y-4">
                            <li>Mengkoordinasikan penyimpanan dan pendokumentasian seluruh Informasi Publik Desa</li>
                            <li>Berkoordinasi dengan Pemerintah Kabupaten dalam pengelolaan Informasi Publik Desa</li>
                            <li>Mengkoordinasikan pengumpulan seluruh Informasi Publik Desa secara fisik</li>
                            <li>Mengkoordinasikan pendataan Informasi Publik Desa dan pemutakhiran Daftar Informasi Publik</li>
                            <li>Mengkoordinasikan penyediaan dan pelayanan Informasi Publik Desa</li>
                            <li>Melakukan pengujian konsekuensi informasi yang dikecualikan</li>
                        </ul>

                        <h3 class="text-xl font-bold mt-8 mb-4">Wewenang:</h3>
                        <ul class="space-y-4">
                            <li>Mengkoordinasikan setiap Badan Publik Desa dalam Pelayanan Informasi Publik</li>
                            <li>Memutuskan suatu Informasi Publik dapat diakses publik atau tidak</li>
                            <li>Menolak permohonan Informasi Publik yang dikecualikan/rahasia</li>
                            <li>Menugaskan pejabat dan petugas informasi untuk pengelolaan informasi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Jenis Informasi -->
        <section id="jenis-informasi" class="mb-16">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">
                    <i class="fas fa-list text-blue-600 dark:text-blue-400 mr-3"></i>
                    Jenis Informasi Publik
                </h2>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-4 bg-blue-50 dark:bg-blue-900/50 rounded-lg border-2 border-blue-100 dark:border-blue-800">
                            <h4 class="font-bold text-gray-900 dark:text-white mb-3">
                                <i class="fas fa-clock mr-2 text-blue-600"></i>
                                Informasi Berkala
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400">
                                Informasi yang wajib disediakan dan diumumkan secara berkala tanpa permohonan
                            </p>
                        </div>
                        <div class="p-4 bg-green-50 dark:bg-green-900/50 rounded-lg border-2 border-green-100 dark:border-green-800">
                            <h4 class="font-bold text-gray-900 dark:text-white mb-3">
                                <i class="fas fa-exclamation-circle mr-2 text-green-600"></i>
                                Informasi Serta Merta
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400">
                                Informasi terkait keadaan darurat yang perlu diumumkan segera
                            </p>
                        </div>
                        <div class="p-4 bg-yellow-50 dark:bg-yellow-900/50 rounded-lg border-2 border-yellow-100 dark:border-yellow-800">
                            <h4 class="font-bold text-gray-900 dark:text-white mb-3">
                                <i class="fas fa-folder-open mr-2 text-yellow-600"></i>
                                Informasi Setiap Saat
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400">
                                Informasi yang tersedia dan dapat diakses melalui permohonan
                            </p>
                        </div>
                        <div class="p-4 bg-red-50 dark:bg-red-900/50 rounded-lg border-2 border-red-100 dark:border-red-800">
                            <h4 class="font-bold text-gray-900 dark:text-white mb-3">
                                <i class="fas fa-lock mr-2 text-red-600"></i>
                                Informasi Dikecualikan
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400">
                                Informasi yang tidak dapat diakses sesuai UU No. 14 Tahun 2008
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Prosedur Permohonan -->
        <section id="prosedur" class="mb-16">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">
                    <i class="fas fa-file-alt text-blue-600 dark:text-blue-400 mr-3"></i>
                    Prosedur Permohonan
                </h2>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Langkah 1 -->
                        <div class="flex">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 dark:text-blue-400 text-xl font-bold">
                                1
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                    Mengajukan Permohonan
                                </h4>
                                <p class="text-gray-600 dark:text-gray-400">
                                    Pemohon mengisi formulir permohonan informasi yang tersedia
                                </p>
                            </div>
                        </div>

                        <!-- Langkah 2 -->
                        <div class="flex">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 dark:text-blue-400 text-xl font-bold">
                                2
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                    Verifikasi Permohonan
                                </h4>
                                <p class="text-gray-600 dark:text-gray-400">
                                    PPID memverifikasi kelengkapan permohonan informasi
                                </p>
                            </div>
                        </div>

                        <!-- Langkah 3 -->
                        <div class="flex">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 dark:text-blue-400 text-xl font-bold">
                                3
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                    Proses Permohonan
                                </h4>
                                <p class="text-gray-600 dark:text-gray-400">
                                    PPID memproses permohonan informasi (max. 10 hari kerja)
                                </p>
                            </div>
                        </div>

                        <!-- Langkah 4 -->
                        <div class="flex">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 dark:text-blue-400 text-xl font-bold">
                                4
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                    Penyerahan Informasi
                                </h4>
                                <p class="text-gray-600 dark:text-gray-400">
                                    Informasi diberikan sesuai dengan permintaan pemohon
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Formulir -->
                    <div class="mt-8 text-center">
                        <a href="{{ asset('storage/formulir/FORM-PERMOHONAN-INFORMASI-PUBLIK.doc') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-download mr-2"></i>
                            Unduh Formulir Permohonan
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection 