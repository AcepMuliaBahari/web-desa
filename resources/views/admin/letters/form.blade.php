@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
    <x-alert />
    
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white">
            {{ isset($letter) ? 'Edit Surat' : 'Tambah Surat Baru' }}
        </h2>
    </div>

    <form action="{{ isset($letter) ? route('admin.letters.update', $letter) : route('admin.letters.store') }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf
        @if(isset($letter))
            @method('PUT')
        @endif

        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="citizen_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Warga</label>
                <select name="citizen_id" id="citizen_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    <option value="">Pilih Warga</option>
                    @foreach($citizens as $citizen)
                        <option value="{{ $citizen->id }}" {{ (old('citizen_id', $letter->citizen_id ?? '') == $citizen->id) ? 'selected' : '' }}>
                            {{ $citizen->name }} - {{ $citizen->nik }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="letter_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Surat</label>
                <select name="letter_type" id="letter_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    <option value="">Pilih Jenis Surat</option>
                    <option value="surat_keterangan" {{ (old('letter_type', $letter->letter_type ?? '') == 'surat_keterangan') ? 'selected' : '' }}>Surat Keterangan</option>
                    <option value="surat_pengantar" {{ (old('letter_type', $letter->letter_type ?? '') == 'surat_pengantar') ? 'selected' : '' }}>Surat Pengantar</option>
                    <option value="surat_rekomendasi" {{ (old('letter_type', $letter->letter_type ?? '') == 'surat_rekomendasi') ? 'selected' : '' }}>Surat Rekomendasi</option>
                </select>
            </div>

            <div>
                <label for="reference_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Surat</label>
                <input type="text" name="reference_number" id="reference_number" value="{{ old('reference_number', $letter->reference_number ?? '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
            </div>

            <div>
                <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tujuan</label>
                <input type="text" name="purpose" id="purpose" value="{{ old('purpose', $letter->purpose ?? '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
            </div>

            <div>
                <label for="lampiran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lampiran</label>
                <input type="text" name="lampiran" id="lampiran" value="{{ old('lampiran', $letter->lampiran ?? '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
            </div>

            <div>
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    <option value="pending" {{ (old('status', $letter->status ?? '') == 'pending') ? 'selected' : '' }}>Menunggu</option>
                    <option value="approved" {{ (old('status', $letter->status ?? '') == 'approved') ? 'selected' : '' }}>Disetujui</option>
                    <option value="rejected" {{ (old('status', $letter->status ?? '') == 'rejected') ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                <textarea name="description" id="description" rows="4" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">{{ old('description', $letter->description ?? '') }}</textarea>
            </div>

            <div class="sm:col-span-2">
                <label for="attachment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File Lampiran</label>
                <input type="file" name="attachment" id="attachment" accept=".pdf,.jpg,.jpeg,.png"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                @if(isset($letter) && $letter->attachment)
                    <p class="mt-1 text-sm text-gray-500">File saat ini: <a href="{{ route('admin.letters.download', $letter) }}" class="text-blue-600 hover:underline">Download</a></p>
                @endif
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                {{ isset($letter) ? 'Update' : 'Simpan' }}
            </button>
            <a href="{{ route('admin.letters.index') }}" class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection 