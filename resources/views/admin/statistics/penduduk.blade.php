@extends('layouts.admin')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Manajemen Data Penduduk
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('admin.statistics.penduduk.update') }}" method="POST">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Data Jenis Kelamin -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Jumlah Laki-laki
                    </label>
                    <input type="number" name="laki_laki" value="{{ old('laki_laki', $data->laki_laki ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Jumlah Perempuan
                    </label>
                    <input type="number" name="perempuan" value="{{ old('perempuan', $data->perempuan ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>

                <!-- Data Usia -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Usia 0-14 Tahun
                    </label>
                    <input type="number" name="usia_0_14" value="{{ old('usia_0_14', $data->usia_0_14 ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Usia 15-64 Tahun
                    </label>
                    <input type="number" name="usia_15_64" value="{{ old('usia_15_64', $data->usia_15_64 ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Usia 65+ Tahun
                    </label>
                    <input type="number" name="usia_65_plus" value="{{ old('usia_65_plus', $data->usia_65_plus ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>

                <!-- Data Pendidikan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Pendidikan SD
                    </label>
                    <input type="number" name="pendidikan_sd" value="{{ old('pendidikan_sd', $data->pendidikan_sd ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Pendidikan SMP
                    </label>
                    <input type="number" name="pendidikan_smp" value="{{ old('pendidikan_smp', $data->pendidikan_smp ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Pendidikan SMA
                    </label>
                    <input type="number" name="pendidikan_sma" value="{{ old('pendidikan_sma', $data->pendidikan_sma ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Pendidikan PT
                    </label>
                    <input type="number" name="pendidikan_pt" value="{{ old('pendidikan_pt', $data->pendidikan_pt ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection