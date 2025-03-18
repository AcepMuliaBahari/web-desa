<section id="pembangunan" class="mb-20">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white">Pembangunan Desa</h2>

        <div class="space-y-6">
            @forelse($developments ?? [] as $development)
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 animate-fade-up">
                    <div class="flex flex-wrap justify-between items-start gap-4 mb-4">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">{{ $development->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-300">{{ $development->description }}</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="px-4 py-1 rounded-full text-sm font-medium
                                {{ $development->status === 'Selesai' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 
                                   ($development->status === 'Proses' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' : 
                                   'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200') }}">
                                {{ $development->status }}
                            </span>
                            <span class="text-gray-600 dark:text-gray-400">
                                {{ $development->start_date->format('d M Y') }} - {{ $development->end_date->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                    <div class="relative pt-1">
                        <div class="flex mb-2 items-center justify-between">
                            <div>
                                <span class="text-xs font-semibold inline-block text-green-600 dark:text-green-400">
                                    Progress
                                </span>
                            </div>
                            <div class="text-right">
                                <span class="text-xs font-semibold inline-block text-green-600 dark:text-green-400">
                                    {{ $development->progress }}%
                                </span>
                            </div>
                        </div>
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200 dark:bg-green-900">
                            <div style="width:{{ $development->progress }}%" 
                                 class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500">
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-8">
                    <p class="text-gray-500 dark:text-gray-400">Belum ada data pembangunan</p>
                </div>
            @endforelse
        </div>
    </div>
</section> 