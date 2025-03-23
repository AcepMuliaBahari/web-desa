@extends('layouts.admin')

@section('content')
<x-alert />
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

    
    <x-admin.section-header 
        title="Daftar Surat" 
        :createRoute="route('admin.letters.create')"
        createText="Tambah Surat" 
    />

    <div class="flex flex-col md:flex-row items-center justify-between p-4">
        <x-admin.search-form 
            :route="route('admin.letters.index')"
            placeholder="Cari surat..." 
        />
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">No</th>
                    <th scope="col" class="px-4 py-3">Nomor Referensi</th>
                    <th scope="col" class="px-4 py-3">Jenis Surat</th>
                    <th scope="col" class="px-4 py-3">Pemohon</th>
                    <th scope="col" class="px-4 py-3">Keperluan</th>
                    <th scope="col" class="px-4 py-3">Tanggal</th>
                    <th scope="col" class="px-4 py-3">Status</th>
                    <th scope="col" class="px-4 py-3">
                        <span class="sr-only">Aksi</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($letters as $letter)
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">{{ $letter->reference_number }}</td>
                    <td class="px-4 py-3">{{ $letter->letter_type }}</td>
                    <td class="px-4 py-3">{{ $letter->citizen->name }}</td>
                    <td class="px-4 py-3">{{ Str::limit($letter->purpose, 50) }}</td>
                    <td class="px-4 py-3">{{ $letter->created_at->format('d/m/Y') }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            @if($letter->status === 'approved') bg-green-100 text-green-800 
                            @elseif($letter->status === 'rejected') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ ucfirst($letter->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <x-admin.action-buttons 
                            :showRoute="route('admin.letters.show', $letter)"
                            :editRoute="route('admin.letters.edit', $letter)"
                            :deleteRoute="route('admin.letters.destroy', $letter)"
                        />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-4 py-3 text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($letters->hasPages())
    <div class="p-4">
        {{ $letters->links() }}
    </div>
    @endif
</div>
@endsection 