@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-4">{{ $service->service_name }}</h1>
                <div class="mb-4">
                    <span class="inline-block bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                        {{ $service->category }}
                    </span>
                </div>
                <div class="prose max-w-none">
                    {!! nl2br(e($service->description)) !!}
                </div>
                <div class="mt-6">
                    <a href="{{ route('public-services.index') }}" 
                       class="inline-block bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                        Kembali ke Daftar Layanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 