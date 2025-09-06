<div class="grid gap-6 md:grid-cols-2">
    <x-statistics.card title="Pendapatan Desa" icon="money-bill-wave" color="green">
        <div class="space-y-4">
            <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                <div class="text-3xl font-bold text-green-600 dark:text-green-400">
                    Rp {{ number_format($apbdesData['pendapatan'] ?? 0, 0, ',', '.') }}
                </div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Total Pendapatan</div>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <!-- <div class="p-3 bg-green-50/50 dark:bg-green-900/10 rounded-lg">
                    <div class="text-lg font-semibold text-green-600 dark:text-green-400">
                        Rp {{ number_format($apbdesData['dana_desa'] ?? 0, 0, ',', '.') }}
                    </div>
                    <div class="text-xs text-gray-600 dark:text-gray-400">Dana Desa</div>
                </div>
                <div class="p-3 bg-green-50/50 dark:bg-green-900/10 rounded-lg">
                    <div class="text-lg font-semibold text-green-600 dark:text-green-400">
                        Rp {{ number_format($apbdesData['pad'] ?? 0, 0, ',', '.') }}
                    </div>
                    <div class="text-xs text-gray-600 dark:text-gray-400">PAD</div>
                </div> -->
            </div>
        </div>
    </x-statistics.card>

    <x-statistics.card title="Belanja Desa" icon="shopping-cart" color="red">
        <div class="space-y-4">
            <div class="p-4 bg-red-50 dark:bg-red-900/20 rounded-lg">
                <div class="text-3xl font-bold text-red-600 dark:text-red-400">
                    Rp {{ number_format($apbdesData['belanja'] ?? 0, 0, ',', '.') }}
                </div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Jumlah Belanja</div>
            </div>
            
            <div class="space-y-3">
                @foreach([
                    'belanja_pembangunan' => 'Bidang Penyelenggaraan Pemerintah Desa',
                    'belanja_operasional' => 'Bidang Pelaksanaan Pembangunan Desa ',
                    'belanja_takterduga' => 'Bidang Pemberdayaan Masyarakat'
                ] as $key => $label)
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ $label }}</span>
                    <span class="font-semibold text-gray-800 dark:text-gray-200">
                        Rp {{ number_format($apbdesData[$key] ?? 0, 0, ',', '.') }}
                    </span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 dark:bg-gray-700">
                    <div class="bg-red-500 h-2 rounded-full" 
                         style="width: {{ ($apbdesData[$key] ?? 0) / ($apbdesData['belanja'] ?? 1) * 100 }}%">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-statistics.card>
</div>

@if($apbdesData['dokumen_url'] ?? false)
<div class="mt-6">
    <x-statistics.card title="Dokumen APBDes" icon="file-pdf" color="blue">
        <a href="{{ $apbdesData['dokumen_url'] }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-900/50 transition-colors duration-200">
            <i class="fas fa-download mr-2"></i>
            Download Dokumen APBDes
        </a>
    </x-statistics.card>
</div>
@endif
