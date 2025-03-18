@extends('components.layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Agenda Kegiatan
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    Daftar agenda dan kegiatan yang akan datang di Desa kami.
                </p>
            </div>

            <!-- Events Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($events as $event)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
                        <!-- Event Header -->
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-start justify-between gap-4">
                                <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                                    {{ $event->title }}
                                </h2>
                                <div class="text-center px-3 py-2 bg-blue-50 dark:bg-blue-900/50 rounded-lg border-2 border-blue-100 dark:border-blue-800 flex-shrink-0">
                                    <span class="block text-lg font-bold text-blue-600 dark:text-blue-400">
                                        {{ \Carbon\Carbon::parse($event->event_date)->format('d') }}
                                    </span>
                                    <span class="block text-sm text-blue-600 dark:text-blue-400">
                                        {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('M') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Event Content -->
                        <div class="p-6">
                            <div class="flex flex-wrap gap-4 mb-4">
                                <div class="flex items-center text-gray-600 dark:text-gray-400">
                                    <i class="far fa-clock mr-2 text-blue-600 dark:text-blue-400"></i>
                                    <span>
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} - 
                                        {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }} WIB
                                    </span>
                                </div>
                                <div class="flex items-center text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-map-marker-alt mr-2 text-blue-600 dark:text-blue-400"></i>
                                    <span>{{ $event->location }}</span>
                                </div>
                            </div>

                            <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                                {{ Str::limit(strip_tags($event->description), 150) }}
                            </p>

                            <a href="{{ route('events.show', $event) }}" 
                               class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:underline">
                                Detail Kegiatan
                                <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-gray-400 dark:text-gray-500 mb-4">
                            <i class="fas fa-calendar-times text-6xl"></i>
                        </div>
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-2">
                            Belum Ada Agenda
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400">
                            Belum ada agenda kegiatan yang terdaftar saat ini.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection