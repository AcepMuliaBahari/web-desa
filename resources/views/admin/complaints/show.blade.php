@extends('layouts.admin')

@section('content')
<div class="container px-6 mx-auto p-5">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Detail Pengaduan</h1>
        <div class="flex space-x-2">
            <a href="{{ route('admin.complaints.index') }}"
                class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300">
                Kembali
            </a>
            @if($complaint->status !== 'resolved')
                <button onclick="openResponseModal()"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                    Tanggapi
                </button>
                <a href="{{ route('admin.complaints.print.single', $complaint) }}" target="_blank" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
                    Cetak
                </a>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Complaint Details -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $complaint->title }}</h2>
                        <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $complaint->created_at->format('d M Y, H:i') }}
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                {{ ucfirst($complaint->complaint_type ?? 'Lainnya') }}
                            </span>
                        </div>
                    </div>
                    <span class="px-3 py-1 text-sm font-semibold rounded-full
                        @if($complaint->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($complaint->status === 'processed') bg-blue-100 text-blue-800
                        @elseif($complaint->status === 'resolved') bg-green-100 text-green-800
                        @else bg-gray-100 text-gray-800
                        @endif">
                        {{ $complaint->status_label }}
                    </span>
                </div>

                <div class="prose dark:prose-invert max-w-none">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $complaint->content }}</p>
                </div>

                <!-- Incident Details -->
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Detail Kejadian</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Lokasi Kejadian</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $complaint->incident_location ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Kejadian</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $complaint->incident_date ? $complaint->incident_date->format('d M Y') : '-' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Waktu Kejadian</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $complaint->incident_time ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Response Section -->
            @if($complaint->response)
                <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800 dark:text-green-200">Tanggapan Admin</h3>
                            <div class="mt-2 text-sm text-green-700 dark:text-green-300">
                                <p>{{ $complaint->response }}</p>
                            </div>
                            <p class="mt-2 text-xs text-green-600 dark:text-green-400">
                                Dibalas pada {{ $complaint->updated_at->format('d M Y, H:i') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Reporter Information -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Informasi Pelapor</h3>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Nama Lengkap</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $complaint->reporter_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Alamat</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $complaint->address ?? '-' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Nomor Telepon</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $complaint->phone ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Attachments -->
            @if($complaint->evidence_file_path || $complaint->document_file_path)
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Lampiran</h3>
                    <div class="space-y-3">
                        @if($complaint->evidence_file_path)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Foto Bukti</label>
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $complaint->evidence_file_path) }}" alt="Foto Bukti" class="rounded-lg max-w-full h-auto mb-2 border dark:border-gray-600">
                                </div>
                                <a href="{{ asset('storage/' . $complaint->evidence_file_path) }}"
                                    target="_blank"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-300 dark:hover:bg-blue-800 transition duration-300">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    Lihat Ukuran Penuh
                                </a>
                            </div>
                        @endif
                        @if($complaint->document_file_path)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Dokumen</label>
                                <a href="{{ asset('storage/' . $complaint->document_file_path) }}"
                                    target="_blank"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 dark:bg-green-900 dark:text-green-300 dark:hover:bg-green-800 transition duration-300">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Lihat Dokumen
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Response Modal -->
<div id="responseModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white dark:bg-gray-800">
        <div class="mt-3">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Tanggapi Pengaduan</h3>
                <button onclick="closeResponseModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="{{ route('admin.complaints.respond', $complaint) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Tanggapan:
                    </label>
                    <textarea name="response" rows="4"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Masukkan tanggapan Anda..." required>{{ old('response') }}</textarea>
                    @error('response')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Status:
                    </label>
                    <select name="status"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="processed" {{ old('status') === 'processed' ? 'selected' : '' }}>Diproses</option>
                        <option value="resolved" {{ old('status') === 'resolved' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeResponseModal()"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition duration-300">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-300">
                        Kirim Tanggapan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openResponseModal() {
    document.getElementById('responseModal').classList.remove('hidden');
}

function closeResponseModal() {
    document.getElementById('responseModal').classList.add('hidden');
    document.querySelector('form').reset();
}

// Close modal when clicking outside
document.getElementById('responseModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeResponseModal();
    }
});
</script>
@endsection
