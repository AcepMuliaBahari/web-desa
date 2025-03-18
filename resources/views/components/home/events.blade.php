<!-- Events Section -->
<div class="w-full md:w-1/2">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 transition-all duration-300 hover:shadow-2xl">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white animate-fade-right">
                <i class="fas fa-calendar-alt mr-2 text-blue-600 dark:text-blue-400"></i>
                Agenda Kegiatan
            </h2>
            <a href="{{ route('events.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-medium transition-colors duration-200">
                Lihat Semua
            </a>
        </div>
        
        <!-- Events Items -->
        <div class="space-y-6">
            @php
                $upcomingEvents = app(\App\Http\Controllers\EventController::class)->getUpcomingEvents();
                // Debug information
                if (config('app.debug')) {
                    Log::info('Events Component Debug:', [
                        'events_count' => $upcomingEvents->count(),
                        'events' => $upcomingEvents->toArray()
                    ]);
                }
            @endphp

            @if($upcomingEvents->isEmpty())
                <div class="text-center py-8">
                    <div class="text-gray-400 dark:text-gray-500 mb-4">
                        <i class="fas fa-calendar-times text-4xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                        Belum Ada Agenda
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Belum ada agenda kegiatan yang akan datang saat ini.
                    </p>
                </div>
            @else
                @foreach($upcomingEvents as $event)
                    <div class="group bg-gradient-to-r from-blue-50 to-white dark:from-gray-700 dark:to-gray-800 rounded-xl p-4 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl animate-fade-up" style="animation-delay: {{ $loop->iteration * 200 }}ms">
                        <div class="flex gap-6">
                            <!-- Tanggal dan Countdown -->
                            <div class="w-24 flex-shrink-0">
                                <div class="bg-blue-500 dark:bg-blue-600 rounded-t-lg p-2 text-center text-white">
                                    <span class="text-lg font-bold">
                                        {{ \Carbon\Carbon::parse($event->event_date)->format('d') }}
                                    </span>
                                    <span class="block text-sm">
                                        {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('M Y') }}
                                    </span>
                                </div>
                                <div class="bg-white dark:bg-gray-900 rounded-b-lg p-2 text-center border-x border-b border-blue-200 dark:border-blue-800">
                                    <div class="countdown text-xs font-medium text-blue-600 dark:text-blue-400" data-target="{{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d H:i:s') }}">
                                        Memuat...
                                    </div>
                                </div>
                            </div>

                            <!-- Konten -->
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="px-3 py-1 text-xs font-medium bg-blue-100 dark:bg-blue-900/50 text-blue-800 dark:text-blue-200 rounded-full flex items-center">
                                        <i class="far fa-clock mr-2"></i>
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} - 
                                        {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }} WIB
                                    </span>
                                    <span class="px-3 py-1 text-xs text-gray-600 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        {{ $event->location }}
                                    </span>
                                </div>
                                <a href="{{ route('events.show', $event) }}" class="block group">
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200">
                                        {{ $event->title }}
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                        {{ Str::limit(strip_tags($event->description), 120) }}
                                    </p>
                                    <span class="inline-flex items-center text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline">
                                        Detail Kegiatan
                                        <i class="fas fa-arrow-right ml-2 transition-transform duration-200 group-hover:translate-x-2"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<script>
function updateCountdown() {
    document.querySelectorAll('.countdown').forEach(el => {
        const targetDate = new Date(el.dataset.target).getTime();
        const now = new Date().getTime();
        const distance = targetDate - now;

        if (distance < 0) {
            el.innerHTML = 'Acara sudah dimulai';
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        el.innerHTML = `${days}h ${hours}j ${minutes}m ${seconds}d`;
    });
}

setInterval(updateCountdown, 1000);
updateCountdown();
</script>