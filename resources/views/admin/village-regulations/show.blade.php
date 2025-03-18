@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <!-- Header -->
                <div class="flex items-center justify-between mb-6">
                    <a href="{{ route('admin.village-regulations.index') }}" 
                       class="flex items-center text-gray-600 hover:text-primary-600 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full">
                            {{ $regulation->type_label }}
                        </span>
                        <span class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                            {{ $regulation->category_label }}
                        </span>
                    </div>
                </div>

                <!-- Title & Status -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                        {{ $regulation->title }}
                    </h1>
                    <div class="flex items-center gap-2">
                        @if($regulation->is_published)
                            <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                Dipublikasikan
                            </span>
                        @else
                            <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">
                                Draft
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Metadata -->
                <div class="grid grid-cols-2 gap-4 mb-6 text-sm">
                    <div>
                        <p class="text-gray-600 dark:text-gray-400">Nomor Regulasi</p>
                        <p class="font-medium text-gray-900 dark:text-white">{{ $regulation->number }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 dark:text-gray-400">Tanggal Ditetapkan</p>
                        <p class="font-medium text-gray-900 dark:text-white">
                            {{ $regulation->date_enacted ? $regulation->date_enacted->isoFormat('D MMMM Y') : '-' }}
                        </p>
                    </div>
                </div>

                <!-- Description -->
                <div class="prose dark:prose-invert max-w-none mb-6">
                    <h3 class="text-lg font-semibold mb-2">Deskripsi</h3>
                    <div class="text-gray-600 dark:text-gray-400">
                        {!! nl2br(e($regulation->description)) !!}
                    </div>
                </div> 

                <!-- Action Buttons -->
                <div class="flex items-center gap-4">
                    @if($regulation->file_path)
                    <a href="{{ route('admin.village-regulations.download', $regulation) }}" 
                       class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors duration-200">
                        <i class="fas fa-download mr-2"></i>
                        Download Dokumen
                    </a>
                    @endif
                    
                    <a href="{{ route('admin.village-regulations.edit', $regulation) }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors duration-200">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection