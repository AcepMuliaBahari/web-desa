@extends('layouts.user')

@section('content')
 <x-alert />
   <x-toast/>
<div class="container px-6 mx-auto p-5">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Edit Pengaduan</h1>

    <form action="{{ route('complaints.update', $complaint) }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <!-- Identitas Pelapor -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Identitas Pelapor</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="reporter_name" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Nama Lengkap</label>
                    <input type="text" id="reporter_name" name="reporter_name" 
                        value="{{ old('reporter_name', $complaint->reporter_name) }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @error('reporter_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="address" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Alamat / Dusun</label>
                    <textarea id="address" name="address" rows="3" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('address', $complaint->address) }}</textarea>
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Nomor Telepon / HP <span class="text-sm text-gray-500">(opsional)</span></label>
                    <input type="tel" id="phone" name="phone" 
                        value="{{ old('phone', $complaint->phone) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Detail Pengaduan -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Detail Pengaduan</h2>

            <div class="mb-4">
                <label for="title" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Judul Pengaduan</label>
                <input type="text" id="title" name="title" 
                    value="{{ old('title', $complaint->title) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Isi Pengaduan</label>
                <textarea id="content" name="content" rows="4" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('content', $complaint->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="complaint_type" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Jenis Pengaduan</label>
                    <select id="complaint_type" name="complaint_type" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="" disabled>Pilih jenis pengaduan</option>
                        <option value="infrastruktur" {{ old('complaint_type', $complaint->complaint_type) == 'infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                        <option value="pelayanan" {{ old('complaint_type', $complaint->complaint_type) == 'pelayanan' ? 'selected' : '' }}>Pelayanan</option>
                        <option value="sosial" {{ old('complaint_type', $complaint->complaint_type) == 'sosial' ? 'selected' : '' }}>Sosial</option>
                        <option value="keamanan" {{ old('complaint_type', $complaint->complaint_type) == 'keamanan' ? 'selected' : '' }}>Keamanan</option>
                        <option value="lingkungan" {{ old('complaint_type', $complaint->complaint_type) == 'lingkungan' ? 'selected' : '' }}>Lingkungan</option>
                        <option value="kesehatan" {{ old('complaint_type', $complaint->complaint_type) == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                        <option value="pendidikan" {{ old('complaint_type', $complaint->complaint_type) == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                        <option value="lainnya" {{ old('complaint_type', $complaint->complaint_type) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('complaint_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="incident_location" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Lokasi Kejadian</label>
                    <input type="text" id="incident_location" name="incident_location" 
                        value="{{ old('incident_location', $complaint->incident_location) }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @error('incident_location')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="incident_date" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Tanggal Kejadian</label>
                    <input type="date" id="incident_date" name="incident_date" 
                        value="{{ old('incident_date', $complaint->incident_date ? $complaint->incident_date->format('Y-m-d') : '') }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @error('incident_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="incident_time" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Waktu Kejadian <span class="text-sm text-gray-500">(opsional)</span></label>
                    <input type="time" id="incident_time" name="incident_time" 
                        value="{{ old('incident_time', $complaint->incident_time ? $complaint->incident_time->format('H:i') : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @error('incident_time')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Lampiran -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Lampiran <span class="text-sm text-gray-500">(opsional)</span></h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="evidence_file" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Foto / Bukti Pendukung</label>
                    <input type="file" id="evidence_file" name="evidence_file" accept="image/*"
                        class="w-full text-gray-700 dark:text-gray-300">
                    @if($complaint->evidence_file_path)
                        <p class="text-sm mt-2">File saat ini: 
                            <a href="{{ asset('storage/'.$complaint->evidence_file_path) }}" target="_blank" class="text-blue-600 underline">Lihat</a>
                        </p>
                    @endif
                    <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                </div>

                <div>
                    <label for="document_file" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Dokumen Terkait</label>
                    <input type="file" id="document_file" name="document_file" accept=".pdf,.doc,.docx"
                        class="w-full text-gray-700 dark:text-gray-300">
                    @if($complaint->document_file_path)
                        <p class="text-sm mt-2">File saat ini: 
                            <a href="{{ asset('storage/'.$complaint->document_file_path) }}" target="_blank" class="text-blue-600 underline">Lihat</a>
                        </p>
                    @endif
                    <p class="text-sm text-gray-500 mt-1">Format: PDF, DOC, DOCX. Maksimal 5MB</p>
                </div>
            </div>
        </div>

        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium">
            Update Pengaduan
        </button>
    </form>
</div>
@endsection

