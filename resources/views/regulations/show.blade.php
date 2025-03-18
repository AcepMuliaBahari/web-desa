@extends('components.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <!-- Navigation -->
                <div class="flex items-center justify-between mb-6">
                    <a href="{{ route('regulations.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                    @if($regulation->file_path)
                    <a href="{{ route('regulations.download', $regulation) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download
                    </a>
                    @endif
                </div>

                <!-- Metadata -->
                <div class="mb-6">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="px-3 py-1 text-sm font-semibold text-blue-800 bg-blue-100 rounded-full">
                            {{ $regulation->category_label }}
                        </span>
                        <span class="px-3 py-1 text-sm font-semibold text-gray-800 bg-gray-100 rounded-full">
                            {{ $regulation->type_label }}
                        </span>
                    </div>
                    
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $regulation->title }}</h1>
                    <p class="text-gray-600">Nomor: {{ $regulation->number }}</p>
                    <p class="text-gray-600">Tanggal: {{ $regulation->date_enacted->isoFormat('D MMMM Y') }}</p>
                </div>

                <!-- Description -->
                <div class="prose max-w-none mb-8">
                    {!! nl2br(e($regulation->description)) !!}
                </div>

                <!-- File Preview -->
                @if($regulation->file_path)
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">File Preview</h2>
                    <iframe src="{{ asset($regulation->file_path) }}" class="w-full h-96 border rounded-md" frameborder="0">
                        Browser Anda tidak mendukung preview file.
                    </iframe>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
