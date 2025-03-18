@extends('components.layout')

@section('title', 'Struktur Organisasi')

@section('content')
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Struktur Organisasi</h2>
                <p class="text-lg text-gray-600 dark:text-gray-300">Struktur Organisasi Pemerintah Desa</p>
            </div>

            @if(isset($officials))
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Debug View:</strong>
                    <p class="text-sm">
                        Jumlah data di view: {{ $officials->count() }}<br>
                        Data: {{ json_encode($officials->toArray()) }}
                    </p>
                </div>
            @else
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Debug View:</strong>
                    <p class="text-sm">Variable $officials tidak tersedia di view</p>
                </div>
            @endif

            <x-home.organization :officials="$officials ?? []" />
        </div>
    </section>
@endsection  