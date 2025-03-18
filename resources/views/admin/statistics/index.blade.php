@extends('layouts.admin')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Manajemen Data Statistik
    </h2>

    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card Data Penduduk -->
        <a href="{{ route('admin.statistics.penduduk') }}" 
           class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Data Penduduk
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ number_format($totalPenduduk ?? 0, 0, ',', '.') }} Jiwa
                </p>
            </div>
        </a>

        <!-- Card APBDes -->
        <a href="{{ route('admin.statistics.apbdes') }}"
           class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    APBDes
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Rp {{ number_format($totalApbdes ?? 0, 0, ',', '.') }}
                </p>
            </div>
        </a>

        <!-- Card Status IDM -->
        <a href="{{ route('admin.statistics.idm') }}"
           class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
            <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Status IDM
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $statusIdm ?? 'Belum ada data' }}
                </p>
            </div>
        </a>

        <!-- Card Status SDGs -->
        <a href="{{ route('admin.statistics.sdgs') }}"
           class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Status SDGs
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalGoalsTercapai ?? 0 }} / 17 Goals
                </p>
            </div>
        </a>
    </div>

    <!-- Recent Activity -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Aktivitas</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($recentActivities ?? [] as $activity)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <p class="font-semibold">{{ $activity->description }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $activity->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                {{ $activity->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection