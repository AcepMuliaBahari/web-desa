@extends('components.layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('desa') }}" class="text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400">
                            <i class="fas fa-home mr-2"></i>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('events.index') }}" class="text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400">Agenda</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="text-gray-500 dark:text-gray-400">{{ Str::limit($event->title, 40) }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Event Detail -->
            <article class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="p-6 md:p-8 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                            {{ $event->title }}
                        </h1>
                        <div class="flex items-center gap-4">
                            <div class="text-center px-4 py-3 bg-blue-50 dark:bg-blue-900/50 rounded-xl border-2 border-blue-100 dark:border-blue-800">
                                <span class="block text-lg font-bold text-blue-600 dark:text-blue-400">
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('d') }}
                                </span>
                                <span class="block text-sm text-blue-600 dark:text-blue-400">
                                    {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('M Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event Info -->
                <div class="p-6 md:p-8">
                    <div class="flex flex-wrap gap-6 mb-8">
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
                        <div class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="far fa-calendar-check mr-2 text-blue-600 dark:text-blue-400"></i>
                            <span>{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('l, d F Y') }}</span>
                        </div>
                    </div>

                    <!-- Event Description -->
                    <div class="prose dark:prose-invert max-w-none">
                        {!! $event->description !!}
                    </div>

                    <!-- Share Buttons -->
                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Bagikan:</h3>
                        <div class="flex gap-4">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                               target="_blank"
                               class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($event->title) }}"
                               target="_blank"
                               class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-400 text-white hover:bg-blue-500 transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($event->title . ' ' . request()->url()) }}"
                               target="_blank"
                               class="flex items-center justify-center w-10 h-10 rounded-full bg-green-500 text-white hover:bg-green-600 transition-colors">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Back Button -->
            <div class="mt-8 text-center">
                <a href="{{ route('events.index') }}"
                   class="inline-flex items-center px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Daftar Agenda
                </a>
            </div>
        </div>
    </div>
@endsection
