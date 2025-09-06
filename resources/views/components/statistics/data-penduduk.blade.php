<div class="space-y-5">
    @if(empty($totalPendudukData) || !isset($totalPendudukData['laki_laki']) || !isset($totalPendudukData['perempuan']))
        <div class="text-center p-6 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg">
            <div class="text-lg font-bold text-yellow-600 dark:text-yellow-400 mb-2">
                Data akan segera ditampilkan
            </div>
        </div>
    @else
        <!-- Total Penduduk Card -->
        <x-statistics.card title="Total Penduduk" icon="users" color="indigo">
            <div class="text-center p-6 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg">
                <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">
                    {{ number_format($totalPendudukData['laki_laki'] + $totalPendudukData['perempuan']) }}
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
                            {{ number_format($totalPendudukData['laki_laki']) }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Laki-laki</div>
                    </div>
                    <div class="text-center p-4 bg-pink-50 dark:bg-pink-900/20 rounded-lg">
                        <div class="text-2xl font-bold text-pink-600 dark:text-pink-400">
                            {{ number_format($totalPendudukData['perempuan']) }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Perempuan</div>
                    </div>
                </div>
                <!-- Persentase dalam bentuk pie chart -->
                <div class="mt-4">
                    <div class="flex justify-between text-xs text-gray-600 dark:text-gray-400">
                        <span>{{ round(($totalPendudukData['laki_laki']) / ($totalPendudukData['laki_laki'] + $totalPendudukData['perempuan']) * 100) }}% Laki-laki</span>
                        <span>{{ round(($totalPendudukData['perempuan']) / ($totalPendudukData['laki_laki'] + $totalPendudukData['perempuan']) * 100) }}% Perempuan</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 mt-1">
                        <div class="bg-blue-600 h-2.5 rounded-l-full" 
                             style="width: {{ ($totalPendudukData['laki_laki']) / ($totalPendudukData['laki_laki'] + $totalPendudukData['perempuan']) * 100 }}%">
                        </div>
                    </div>
                </div>
            </x-statistics.card>

            <x-statistics.card title="Kelompok Usia" icon="users" color="green">
                <div class="space-y-3">
                    @foreach([
                        'usia_0_14' => 'Balita (0-5)',
                        'usia_15_64' => 'Dewasa (6-60)',
                        'usia_65_plus' => 'Lansia (>60)'
                    ] as $key => $label)
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">{{ $label }}</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">
                            {{ number_format($totalPendudukData[$key]) }}
                            <span class="text-xs text-gray-500">
                                ({{ round(($totalPendudukData[$key]) / ($totalPendudukData['laki_laki'] + $totalPendudukData['perempuan']) * 100) }}%)
                            </span>
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 dark:bg-gray-700">
                        <div class="bg-green-500 h-2 rounded-full" 
                             style="width: {{ ($totalPendudukData[$key]) / ($totalPendudukData['laki_laki'] + $totalPendudukData['perempuan']) * 100 }}%">
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
                            {{ number_format($totalPendudukData[$key]) }}
                            <span class="text-xs text-gray-500">
                                ({{ round(($totalPendudukData[$key]) / ($totalPendudukData['laki_laki'] + $totalPendudukData['perempuan']) * 100) }}%)
                            </span>
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 dark:bg-gray-700">
                        <div class="bg-purple-500 h-2 rounded-full" 
                             style="width: {{ ($totalPendudukData[$key]) / ($totalPendudukData['laki_laki'] + $totalPendudukData['perempuan']) * 100 }}%">
                        </div>
                    </div>
                    @endforeach
                </div>
            </x-statistics.card>
        </div>
    @endif
</div>
