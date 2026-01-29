@extends('layouts.user')

@section('content')
 <x-alert />
   <x-toast/>
<div class="container px-6 mx-auto grid gap-6 p-5">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Pengaduan Saya</h1>
        <a href="{{ route('complaints.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Buat Pengaduan Baru
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            @if($complaints->count() > 0)
                <div class="space-y-4">
                    @foreach($complaints as $complaint)
                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $complaint->title }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ Str::limit($complaint->content, 100) }}</p>
                                    <div class="mt-2 space-y-1">
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            <span class="font-medium">Jenis:</span> {{ ucfirst($complaint->complaint_type) }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            <span class="font-medium">Lokasi:</span> {{ $complaint->incident_location }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            <span class="font-medium">Tanggal:</span> {{ $complaint->incident_date ? $complaint->incident_date->format('d/m/Y') : '-' }}
                                            @if($complaint->incident_time)
                                                {{ $complaint->incident_time ? $complaint->incident_time->format('H:i') : '' }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="flex items-center mt-3 space-x-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($complaint->status === 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($complaint->status === 'processed') bg-blue-100 text-blue-800
                                        @else bg-green-100 text-green-800 @endif">
                                        {{ $complaint->status_label }}
                                    </span>

                                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $complaint->created_at ? $complaint->created_at->diffForHumans() : '-' }}</span>
                                    </div>

                                    <!-- Admin Response Section -->
                                    @if($complaint->response)
                                        <div class="mt-4 p-3 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-400 rounded">
                                            <div class="flex items-start">
                                                <svg class="w-5 h-5 text-green-400 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                                </svg>
                                                <div class="flex-1">
                                                    <h4 class="text-sm font-medium text-green-800 dark:text-green-200">Tanggapan Admin</h4>
                                                    <p class="text-sm text-green-700 dark:text-green-300 mt-1">{{ $complaint->response }}</p>
                                                    @if($complaint->updated_at && $complaint->updated_at != $complaint->created_at)
                                                        <p class="text-xs text-green-600 dark:text-green-400 mt-1">
                                                            Ditanggapi pada {{ $complaint->updated_at->format('d/m/Y H:i') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

<!-- Modal Konfirmasi -->
<div id="confirmDeleteModal{{ $complaint->id }}" tabindex="-1" aria-hidden="true"
     class="hidden fixed top-0 left-0 right-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md">
        <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">
            Apakah yakin ingin menghapus pengaduan ini?
        </h3>
        <div class="flex justify-end space-x-3">
            <button data-modal-hide="confirmDeleteModal{{ $complaint->id }}" type="button"
                    class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                Batal
            </button>
            <form action="{{ route('complaints.destroy', $complaint) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                    Ya, Hapus
                </button>
            </form>
        </div>
    </div>
</div>


<div class="ml-4 flex items-center space-x-2">
    <!-- Lihat Detail -->
    <a href="{{ route('complaints.show', $complaint) }}"
       class="px-3 py-1 text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition">
        Lihat Detail
    </a>

    @if($complaint->status === 'pending')
        <!-- Edit -->
        <a href="{{ route('complaints.edit', $complaint) }}"
           class="px-3 py-1 text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 transition">
            Edit
        </a>

        <!-- Hapus -->
        <!-- <form action="{{ route('complaints.destroy', $complaint) }}" method="POST"
              onsubmit="return confirm('Yakin mau hapus pengaduan ini?')" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="px-3 py-1 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition">
                Hapus
            </button>
        </form> -->

  <!-- Tombol Hapus -->
<button data-modal-target="confirmDeleteModal{{ $complaint->id }}" data-modal-toggle="confirmDeleteModal{{ $complaint->id }}"
        class="px-3 py-1 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition">
    Hapus
</button>


    @endif
</div>



                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $complaints->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Belum ada pengaduan</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Mulai buat pengaduan pertama Anda.</p>
                    <div class="mt-6">
                        <a href="{{ route('complaints.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Buat Pengaduan Baru
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
