<div class="grid gap-6 md:grid-cols-2">
    <x-statistics.card title="Status IDM" icon="chart-line" color="blue">
        <div class="text-center p-6 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
            <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2">
                {{ number_format($statusIdmData['skor'] ?? 0, 4) }}
            </div>
            <div class="inline-block px-4 py-2 rounded-full 
                {{ ($statusIdmData['status'] ?? '') === 'Mandiri' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300' :
                   (($statusIdmData['status'] ?? '') === 'Berkembang' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300' :
                   (($statusIdmData['status'] ?? '') === 'Tertinggal' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300' :
                   'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300')) }}">
                {{ $statusIdmData['status'] ?? 'Tidak ada data' }}
            </div>
        </div>
    </x-statistics.card>

    <x-statistics.card title="Indeks Dimensi" icon="chart-bar" color="purple">
        <div class="space-y-4">
            @foreach([
                'sosial' => ['label' => 'Sosial', 'color' => 'blue'],
                'ekonomi' => ['label' => 'Ekonomi', 'color' => 'green'],
                'lingkungan' => ['label' => 'Lingkungan', 'color' => 'yellow']
            ] as $key => $data)
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ $data['label'] }}</span>
                    <span class="text-sm font-medium text-gray-800 dark:text-gray-200">
                        {{ number_format($statusIdmData[$key] ?? 0, 2) }}%
                    </span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                    <div class="{{ 'bg-'.$data['color'].'-500' }} h-2.5 rounded-full" 
                         style="width: {{ $statusIdmData[$key] ?? 0 }}%">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </x-statistics.card>
</div>