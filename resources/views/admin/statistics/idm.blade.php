@extends('layouts.admin')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Manajemen Status IDM
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('admin.statistics.idm.update') }}" method="POST">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Skor dan Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Skor IDM
                    </label>
                    <input type="number" step="0.0001" min="0" max="1" name="skor" 
                           value="{{ old('skor', $data->skor ?? 0) }}"
                           class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Status
                    </label>
                    <select name="status" 
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                        @foreach(['Mandiri', 'Berkembang', 'Tertinggal', 'Sangat Tertinggal'] as $status)
                            <option value="{{ $status }}" {{ (old('status', $data->status ?? '') == $status) ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Indikator -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Indeks Sosial (%)
                    </label>
                    <input type="number" step="0.01" min="0" max="100" name="sosial" 
                           value="{{ old('sosial', $data->sosial ?? 0) }}"
                           class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Indeks Ekonomi (%)
                    </label>
                    <input type="number" step="0.01" min="0" max="100" name="ekonomi" 
                           value="{{ old('ekonomi', $data->ekonomi ?? 0) }}"
                           class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Indeks Lingkungan (%)
                    </label>
                    <input type="number" step="0.01" min="0" max="100" name="lingkungan" 
                           value="{{ old('lingkungan', $data->lingkungan ?? 0) }}"
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