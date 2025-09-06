@extends('layouts.admin')

@section('content')

<div class="container px-6 mx-auto grid gap-6 p-5">
    <!-- Grid utama untuk card statistik -->
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card Komponen -->
        @foreach ([
            ['route' => 'admin.statistics.penduduk', 'title' => 'Data Penduduk', 'value' => number_format($totalPenduduk ?? 0, 0, ',', '.'), 'unit' => 'Jiwa', 'icon' => 'users', 'color' => 'blue'],
        ] as $item)
        <a href="{{ route($item['route']) }}"
           class="flex items-center p-4 bg-white rounded-lg shadow-md transition-transform transform hover:scale-105 hover:shadow-lg dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
            <div class="p-3 mr-4 text-{{ $item['color'] }}-500 bg-{{ $item['color'] }}-100 rounded-full dark:text-{{ $item['color'] }}-100 dark:bg-{{ $item['color'] }}-500">
                <i class="fas fa-{{ $item['icon'] }} w-5 h-5"></i>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-gray-600 dark:text-gray-400">{{ $item['title'] }}</p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $item['value'] }}</p>
            </div>
        </a>
        @endforeach
    </div>

    <!-- Grid untuk konten tambahan -->
    <div class="grid w-full grid-cols-1 gap-4 mt-6 xl:grid-cols-2 2xl:grid-cols-3">
        @foreach ([
            ['title' => 'Pengaduan Terbaru', 'route' => 'admin.complaints.index', 'data' => $latestComplaints, 'type' => 'complaints'],
            ['title' => 'Berita Terbaru', 'route' => 'admin.news.index', 'data' => $latestNews, 'type' => 'news'],
            
            ['title' => 'UMKM Terdaftar', 'route' => 'admin.umkm.index', 'data' => $umkm, 'type' => 'umkm'],
            
        ] as $section)
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $section['title'] }}</h3>
                <a href="{{ route($section['route']) }}" class="text-blue-600 hover:underline dark:text-blue-400">Lihat Semua</a>
            </div>
            <div class="space-y-4">
                @if ($section['type'] == 'gallery')
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($section['data'] as $photo)
                            <img src="{{ Storage::url($photo->url ?? $photo->image ?? $photo->photo) }}" class="rounded-lg object-cover w-full h-24" alt="Gallery Image">
                        @endforeach
                    </div>
                @elseif ($section['type'] == 'complaints')
                    @forelse ($section['data'] as $complaint)
                        <div class="flex items-center">
                            @if ($complaint->evidence_file_path)
                                <img src="{{ Storage::url($complaint->evidence_file_path) }}" class="w-12 h-12 rounded-lg object-cover mr-3" alt="Evidence Image">
                            @else
                                <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center mr-3">
                                    <img src="{{ asset('images/no-image.jpg') }}" class="w-12 h-12 rounded-lg object-cover" alt="No Image">
                                </div>
                            @endif
                            <div>
                                <h4 class="font-medium text-gray-900 dark:text-white">{{ $complaint->title }}</h4>
                                <p class="text-sm text-gray-500">{{ $complaint->reporter_name }} • {{ $complaint->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 dark:text-gray-400">Belum ada pengaduan</p>
                    @endforelse
                @else
                    @forelse ($section['data'] as $item)
                        <div class="flex items-center">
                            @if (isset($item->thumbnail) || isset($item->photo) || isset($item->image))
                                <img src="{{ Storage::url($item->thumbnail ?? $item->photo ?? $item->image) }}" class="w-12 h-12 rounded-lg object-cover mr-3" alt="Item Image">
                            @else
                                <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-gray-500 text-xs">No Image</span>
                                </div>
                            @endif
                            <div>
                                <h4 class="font-medium text-gray-900 dark:text-white">{{ $item->title ?? $item->name }}</h4>
                                <p class="text-sm text-gray-500">{{ $item->position ?? $item->category ?? $item->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 dark:text-gray-400">Belum ada data</p>
                    @endforelse
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
