@extends('layouts.admin')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Manajemen Data APBDes
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('admin.statistics.apbdes.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Data Pendapatan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Total Pendapatan
                    </label>
                    <input type="number" name="pendapatan" value="{{ old('pendapatan', $data->pendapatan ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Dana Desa
                    </label>
                    <input type="number" name="dana_desa" value="{{ old('dana_desa', $data->dana_desa ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>

                <!-- Data PAD dan Bantuan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Pendapatan Asli Desa
                    </label>
                    <input type="number" name="pad" value="{{ old('pad', $data->pad ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Bantuan
                    </label>
                    <input type="number" name="bantuan" value="{{ old('bantuan', $data->bantuan ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>

                <!-- Data Belanja -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Total Belanja
                    </label>
                    <input type="number" name="belanja" value="{{ old('belanja', $data->belanja ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Belanja Pembangunan
                    </label>
                    <input type="number" name="belanja_pembangunan" value="{{ old('belanja_pembangunan', $data->belanja_pembangunan ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Belanja Operasional
                    </label>
                    <input type="number" name="belanja_operasional" value="{{ old('belanja_operasional', $data->belanja_operasional ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Belanja Tak Terduga
                    </label>
                    <input type="number" name="belanja_takterduga" value="{{ old('belanja_takterduga', $data->belanja_takterduga ?? 0) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>

                <!-- Upload Dokumen -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Dokumen APBDes (PDF)
                    </label>
                    <input type="file" name="dokumen" accept=".pdf"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @if($data->dokumen_url ?? false)
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Dokumen saat ini: <a href="{{ $data->dokumen_url }}" target="_blank" class="text-blue-500 hover:underline">Lihat dokumen</a>
                    </p>
                    @endif
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