@extends('layouts.admin')

@section('content')


    <!-- Statistik Utama -->
    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
        <!-- Berita -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Berita Terbaru</h3>
                <a href="{{ route('admin.news.index') }}" class="inline-flex items-center p-2 text-sm font-medium rounded-lg text-primary-700 hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                    Lihat Semua
                </a>
            </div>
            <div class="space-y-4">
                @forelse($latestNews as $news)
                <div class="flex items-center">
                    @if($news->thumbnail && Storage::disk('public')->exists($news->thumbnail))
                        <img src="{{ Storage::url($news->thumbnail) }}" class="w-16 h-16 rounded-lg object-cover mr-4" alt="Thumbnail berita">
                    @else
                        <div class="w-16 h-16 bg-gray-200 rounded-lg mr-4 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white">{{ $news->title }}</h4>
                        <p class="text-sm text-gray-500">{{ $news->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 dark:text-gray-400">Belum ada berita</p>
                @endforelse
            </div>
        </div>

        <!-- Pejabat -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pejabat Desa</h3>
                <a href="{{ route('organization.index') }}" class="inline-flex items-center p-2 text-sm font-medium rounded-lg text-primary-700 hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                    Lihat Semua
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @forelse($officials as $official)
                <div class="flex items-center">
                    @if($official->photo && Storage::disk('public')->exists($official->photo))
                        <img src="{{ Storage::url($official->photo) }}" class="w-12 h-12 rounded-full object-cover mr-3" alt="Foto pejabat">
                    @else
                        <div class="w-12 h-12 bg-gray-200 rounded-full mr-3 flex items-center justify-center">
                            <span class="text-gray-500">No Photo</span>
                        </div>
                    @endif
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white">{{ $official->name }}</h4>
                        <p class="text-sm text-gray-500">{{ $official->position }}</p>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 dark:text-gray-400">Belum ada data pejabat</p>
                @endforelse
            </div>
        </div>

        <!-- UMKM -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">UMKM Terdaftar</h3>
                <a href="{{ route('admin.umkm.index') }}" class="inline-flex items-center p-2 text-sm font-medium rounded-lg text-primary-700 hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                    Lihat Semua
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @forelse($umkm as $umkms)
                <div class="flex items-center">
                    @if($umkms->image && Storage::disk('public')->exists($umkms->image))
                        <img src="{{ Storage::url($umkms->image) }}" class="w-12 h-12 rounded-lg object-cover mr-3" alt="Logo UMKM">
                    @else
                        <div class="w-12 h-12 bg-gray-200 rounded-lg mr-3 flex items-center justify-center">
                            <span class="text-gray-500">No Logo</span>
                        </div>
                    @endif
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white">{{ $umkms->name }}</h4>
                        <p class="text-sm text-gray-500">{{ $umkms->category }}</p>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 dark:text-gray-400">Belum ada UMKM terdaftar</p>
                @endforelse
            </div>
        </div>

        <!-- Galeri -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Galeri Foto</h3>
                <a href="{{ route('potentials.index') }}" class="inline-flex items-center p-2 text-sm font-medium rounded-lg text-primary-700 hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                    Lihat Semua
                </a>
            </div>
            <div class="grid grid-cols-3 gap-4">
                @forelse($gallery as $photo)
                <div class="relative aspect-square">
                    @if($photo->url && Storage::disk('public')->exists($photo->url))
                        <img src="{{ Storage::url($photo->url) }}" class="absolute inset-0 w-full h-full rounded-lg object-cover" alt="Foto galeri">
                    @else
                        <div class="absolute inset-0 w-full h-full bg-gray-200 rounded-lg flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif
                </div>
                @empty
                <p class="text-gray-500 dark:text-gray-400 col-span-3">Belum ada foto</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection 