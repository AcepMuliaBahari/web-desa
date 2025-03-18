<div class="space-y-6">
    <!-- Total Penduduk Card -->
    <x-statistics.card title="Total Penduduk" icon="users" color="indigo">
        <div class="text-center p-6 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg">
            <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">
                {{ number_format($dataPendudukData['total'] ?? 0) }}
            </div>
            <div class="text-sm text-gray-600 dark:text-gray-400">Total Penduduk Desa</div>
        </div>
    </x-statistics.card>

    <!-- Detail Cards -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <x-statistics.card title="Jenis Kelamin" icon="venus-mars" color="blue">
            <div class="grid grid-cols-2 gap-4">
                <div class="text-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                    <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                        {{ number_format($dataPendudukData['laki_laki'] ?? 0) }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Laki-laki</div>
                </div>
                <div class="text-center p-4 bg-pink-50 dark:bg-pink-900/20 rounded-lg">
                    <div class="text-2xl font-bold text-pink-600 dark:text-pink-400">
                        {{ number_format($dataPendudukData['perempuan'] ?? 0) }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Perempuan</div>
                </div>
            </div>
            <!-- Persentase dalam bentuk pie chart -->
            <div class="mt-4">
                <div class="flex justify-between text-xs text-gray-600 dark:text-gray-400">
                    <span>{{ round(($dataPendudukData['laki_laki'] ?? 0) / ($dataPendudukData['total'] ?? 1) * 100) }}% Laki-laki</span>
                    <span>{{ round(($dataPendudukData['perempuan'] ?? 0) / ($dataPendudukData['total'] ?? 1) * 100) }}% Perempuan</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 mt-1">
                    <div class="bg-blue-600 h-2.5 rounded-l-full" 
                         style="width: {{ ($dataPendudukData['laki_laki'] ?? 0) / ($dataPendudukData['total'] ?? 1) * 100 }}%">
                    </div>
                </div>
            </div>
        </x-statistics.card>

        <x-statistics.card title="Kelompok Usia" icon="users" color="green">
            <div class="space-y-3">
                @foreach([
                    'balita' => 'Balita (0-5)',
                    'anak' => 'Anak (6-17)',
                    'dewasa' => 'Dewasa (18-60)',
                    'lansia' => 'Lansia (>60)'
                ] as $key => $label)
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ $label }}</span>
                    <span class="font-semibold text-gray-800 dark:text-gray-200">
                        {{ number_format($dataPendudukData[$key] ?? 0) }}
                        <span class="text-xs text-gray-500">
                            ({{ round(($dataPendudukData[$key] ?? 0) / ($dataPendudukData['total'] ?? 1) * 100) }}%)
                        </span>
                    </span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 dark:bg-gray-700">
                    <div class="bg-green-500 h-2 rounded-full" 
                         style="width: {{ ($dataPendudukData[$key] ?? 0) / ($dataPendudukData['total'] ?? 1) * 100 }}%">
                    </div>
                </div>
                @endforeach
            </div>
        </x-statistics.card>

        <x-statistics.card title="Tingkat Pendidikan" icon="graduation-cap" color="purple">
            <div class="space-y-3">
                @foreach([
                    'pendidikan_sd' => 'SD/Sederajat',
                    'pendidikan_smp' => 'SMP/Sederajat',
                    'pendidikan_sma' => 'SMA/Sederajat',
                    'pendidikan_pt' => 'Perguruan Tinggi'
                ] as $key => $label)
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ $label }}</span>
                    <span class="font-semibold text-gray-800 dark:text-gray-200">
                        {{ number_format($dataPendudukData[$key] ?? 0) }}
                        <span class="text-xs text-gray-500">
                            ({{ round(($dataPendudukData[$key] ?? 0) / ($dataPendudukData['total'] ?? 1) * 100) }}%)
                        </span>
                    </span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 dark:bg-gray-700">
                    <div class="bg-purple-500 h-2 rounded-full" 
                         style="width: {{ ($dataPendudukData[$key] ?? 0) / ($dataPendudukData['total'] ?? 1) * 100 }}%">
                    </div>
                </div>
                @endforeach
            </div>
        </x-statistics.card>
    </div>
</div>