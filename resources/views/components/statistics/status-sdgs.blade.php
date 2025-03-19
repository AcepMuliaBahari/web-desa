<div class="space-y-6">
    <x-statistics.card title="Ringkasan Status" icon="chart-pie" color="blue">
        <div class="grid grid-cols-3 gap-4">
            <!-- Perbaikan key summary -->
            <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-lg text-center">
                <div class="text-2xl font-bold text-green-600 dark:text-green-400">
                    {{ $statusSdgsData['summary']['tercapai'] ?? 0 }}
                </div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Tercapai</div>
            </div>
            <div class="p-4 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg text-center">
                <div class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">
                    {{ $statusSdgsData['summary']['dalam_proses'] ?? 0 }}
                </div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Dalam Proses</div>
            </div>
            <div class="p-4 bg-red-50 dark:bg-red-900/20 rounded-lg text-center">
                <div class="text-2xl font-bold text-red-600 dark:text-red-400">
                    {{ $statusSdgsData['summary']['belum_tercapai'] ?? 0 }}
                </div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Belum Tercapai</div>
            </div>
        </div>
    </x-statistics.card>

    <x-statistics.card title="Detail Goals" icon="bullseye" color="purple">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($statusSdgsData['goals'] as $goal)
            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Goal {{ $goal['nomor'] ?? 'N/A' }}
                    </span>
                    <div class="w-3 h-3 rounded-full
                        {{ match($goal['status'] ?? '') {
                            'Tercapai' => 'bg-green-500',
                            'Dalam Proses' => 'bg-yellow-500',
                            default => 'bg-red-500'
                        } }}">
                    </div>
                </div>
                <p class="text-xs text-gray-600 dark:text-gray-400 mb-2">
                    {{ $goal['nama'] ?? 'Nama Goal Tidak Tersedia' }}
                </p>
                <div class="relative pt-1">
                    <div class="flex mb-2 items-center justify-between">
                        <div class="text-xs text-gray-600 dark:text-gray-400">
                            {{ ($goal['persentase'] ?? 0) }}%
                        </div>
                    </div>
                    <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200 dark:bg-gray-700">
                        <div class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"
                             style="width: {{ ($goal['persentase'] ?? 0) }}%">
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-6">
                <p class="text-gray-500 dark:text-gray-400">
                    Tidak ada data goals yang tersedia
                </p>
            </div>
            @endforelse
        </div>
    </x-statistics.card>
</div>