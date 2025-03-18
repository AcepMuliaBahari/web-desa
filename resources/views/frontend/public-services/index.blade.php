@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Layanan Publik</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($services as $service)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $service->service_name }}</h2>
                    <p class="text-gray-600 text-sm mb-4">{{ $service->category }}</p>
                    <p class="text-gray-700 mb-4">{{ Str::limit($service->description, 150) }}</p>
                    <a href="{{ route('public-services.show', $service->id) }}" 
                       class="inline-block bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
                        Selengkapnya
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-8">
                <p class="text-gray-500">Tidak ada layanan publik yang tersedia</p>
            </div>
        @endforelse
    </div>
</div>
@endsection