<x-user-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <!-- Kartu Informasi Profil -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-500 bg-opacity-10">
                        <i class="fas fa-user text-blue-500 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Profil</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $user->name }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('user.profile') }}" class="text-sm text-blue-500 hover:text-blue-700 dark:hover:text-blue-400">
                        Lihat Profil <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Kartu Permohonan Surat -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-500 bg-opacity-10">
                        <i class="fas fa-envelope text-green-500 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Permohonan Surat</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $letterCount }} Permohonan</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('user.letters.index') }}" class="text-sm text-green-500 hover:text-green-700 dark:hover:text-green-400">
                        Lihat Permohonan <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Kartu Pengaduan -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-500 bg-opacity-10">
                        <i class="fas fa-bullhorn text-yellow-500 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Pengaduan</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $complaintCount }} Pengaduan</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('user.complaints.index') }}" class="text-sm text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400">
                        Lihat Pengaduan <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Kartu Berita Desa -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-500 bg-opacity-10">
                        <i class="fas fa-newspaper text-purple-500 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Berita Desa</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $newsCount }} Berita Baru</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('user.village.news') }}" class="text-sm text-purple-500 hover:text-purple-700 dark:hover:text-purple-400">
                        Lihat Berita <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Permohonan Terbaru -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg mb-8">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Status Permohonan Terbaru</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jenis Surat</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal Pengajuan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($recentLetters as $index => $letter)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $letter['type'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $letter['date'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($letter['status'] == 'Selesai')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                    {{ $letter['status'] }}
                                </span>
                                @elseif($letter['status'] == 'Diproses')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                    {{ $letter['status'] }}
                                </span>
                                @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                    {{ $letter['status'] }}
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                <a href="{{ route('user.letters.show', $letter['id']) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Berita dan Agenda Terbaru -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Berita Terbaru -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Berita Terbaru</h3>
                <div class="space-y-4">
                    @foreach($recentNews as $news)
                    <div class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <div class="h-12 w-12 rounded-md bg-{{ $news['color'] }}-500 flex items-center justify-center">
                                <i class="fas fa-newspaper text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $news['title'] }}</h4>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $news['date'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-4 text-right">
                    <a href="{{ route('user.village.news') }}" class="text-sm text-blue-500 hover:text-blue-700 dark:hover:text-blue-400">
                        Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Agenda Terbaru -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Agenda Desa</h3>
                <div class="space-y-4">
                    @foreach($upcomingEvents as $event)
                    <div class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <div class="h-12 w-12 rounded-md bg-{{ $event['color'] }}-500 flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $event['title'] }}</h4>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $event['date'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-4 text-right">
                    <a href="{{ route('user.village.events') }}" class="text-sm text-blue-500 hover:text-blue-700 dark:hover:text-blue-400">
                        Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-user-layout> 