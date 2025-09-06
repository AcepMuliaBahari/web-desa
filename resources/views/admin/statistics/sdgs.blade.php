@extends('layouts.admin')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Manajemen Status SDGs
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('admin.statistics.sdgs.update') }}" method="POST">
            @csrf
            <div class="space-y-6">
                <!-- Goals -->
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @for ($i = 1; $i <= 3; $i++)
                        @php
                            $goal = collect($data->goals ?? [])->firstWhere('nomor', $i);
                        @endphp
                        <div class="p-4 border rounded-lg dark:border-gray-700">
                            <h3 class="text-lg font-semibold mb-4">Goal {{ $i }}</h3>
                            
                            <input type="hidden" name="goals[{{ $i-1 }}][nomor]" value="{{ $i }}">
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Nama Goal
                                    </label>
                                    <input type="text" name="goals[{{ $i-1 }}][nama]" 
                                           value="{{ old("goals.$i.nama", $goal['nama'] ?? '') }}"
                                           class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Status
                                    </label>
                                    <select name="goals[{{ $i-1 }}][status]"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                        @foreach(['Tercapai', 'Dalam Proses', 'Belum Tercapai'] as $status)
                                            <option value="{{ $status }}" 
                                                {{ (old("goals.$i.status", $goal['status'] ?? '') == $status) ? 'selected' : '' }}>
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Persentase Pencapaian (%)
                                    </label>
                                    <input type="number" step="0.01" min="0" max="100" 
                                           name="goals[{{ $i-1 }}][persentase]"
                                           value="{{ old("goals.$i.persentase", $goal['persentase'] ?? 0) }}"
                                           class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection