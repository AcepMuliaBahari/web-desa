@extends('layouts.admin')

@section('content')
<x-alert />
<div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border-l-4 border-blue-500">

<div class="overflow-x-auto">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 mb-4 p-4">
        <div class="w-full md:w-1/2">
            <form class="space-y-4" method="GET" action="{{ route('admin.citizens.index') }}">
                {{-- Pencarian Nama/NIK --}}
                <div class="flex items-center space-x-2">
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5" 
                            placeholder="Cari nama, NIK, atau No. KK...">
                    </div>

                    {{-- RT/RW Filter --}}
                    <select name="rt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5">
                        <option value="">RT</option>
                        @foreach(range(1, 20) as $rt)
                            <option value="{{ sprintf('%03d', $rt) }}" {{ request('rt') == sprintf('%03d', $rt) ? 'selected' : '' }}>
                                {{ sprintf('%03d', $rt) }}
                            </option>
                        @endforeach
                    </select>

                    <select name="rw" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5">
                        <option value="">RW</option>
                        @foreach(range(1, 10) as $rw)
                            <option value="{{ sprintf('%03d', $rw) }}" {{ request('rw') == sprintf('%03d', $rw) ? 'selected' : '' }}>
                                {{ sprintf('%03d', $rw) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter Tambahan --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                    <select name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5">
                        <option value="">Jenis Kelamin</option>
                        <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>

                    <select name="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5">
                        <option value="">Agama</option>
                        @foreach($agamaList as $agama)
                            <option value="{{ $agama }}" {{ request('agama') == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                        @endforeach
                    </select>

                    <select name="status_perkawinan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5">
                        <option value="">Status Perkawinan</option>
                        @foreach($statusList as $status)
                            <option value="{{ $status }}" {{ request('status_perkawinan') == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>

                    <select name="pendidikan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5">
                        <option value="">Pendidikan</option>
                        @foreach($pendidikanList as $pendidikan)
                            <option value="{{ $pendidikan }}" {{ request('pendidikan') == $pendidikan ? 'selected' : '' }}>{{ $pendidikan }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter Usia --}}
                <div class="flex items-center space-x-2">
                    <input type="number" name="usia_dari" value="{{ request('usia_dari') }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5" 
                        placeholder="Usia dari">
                    <span class="text-gray-500">-</span>
                    <input type="number" name="usia_sampai" value="{{ request('usia_sampai') }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5" 
                        placeholder="Usia sampai">
                    
                    <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Filter
                    </button>
                    
                    @if(request()->hasAny(['search', 'rt', 'rw', 'jenis_kelamin', 'agama', 'status_perkawinan', 'pendidikan', 'usia_dari', 'usia_sampai']))
                        <a href="{{ route('admin.citizens.index') }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>
        <div class="w-full md:w-auto flex flex-row space-x-3">
            <div class="flex items-center space-x-3">
                <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Aksi
                </button>
                <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                        <li>
                            <a href="{{ route('admin.citizens.export') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                <i class="fas fa-file-excel mr-2"></i>Export Excel
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.citizens.print') }}" target="_blank" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                <i class="fas fa-print mr-2"></i>Print PDF
                            </a>
                        </li>
                        <li>
                            <button type="button" data-modal-target="importModal" data-modal-toggle="importModal" class="block w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-left">
                                <i class="fas fa-file-import mr-2"></i>Import Excel
                            </button>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('admin.citizens.create') }}" class="flex items-center justify-center text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Tambah Penduduk
                </a>
            </div>
        </div>
    </div>


    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-900 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">NIK</th>
                    <th scope="col" class="px-4 py-3">No. KK</th>
                    <th scope="col" class="px-4 py-3">Nama</th>
                    <th scope="col" class="px-4 py-3">TTL</th>
                    <th scope="col" class="px-4 py-3">JK</th>
                    <th scope="col" class="px-4 py-3">Alamat</th>
                    <th scope="col" class="px-4 py-3">RT/RW</th>
                    <th scope="col" class="px-4 py-3">Agama</th>
                    <th scope="col" class="px-4 py-3">Status</th>
                    <th scope="col" class="px-4 py-3">Pekerjaan</th>
                    <th scope="col" class="px-4 py-3">Kewarganegaraan</th>
                    <th scope="col" class="px-4 py-3">Pendidikan</th>
                    <th scope="col" class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citizens as $citizen)
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3">{{ $citizen->nik }}</td>
                    <td class="px-4 py-3">{{ $citizen->no_kk }}</td>
                    <td class="px-4 py-3">{{ $citizen->name }}</td>
                    <td class="px-4 py-3">{{ $citizen->tempat_lahir }}, {{ $citizen->tanggal_lahir->format('d/m/Y') }}</td>
                    <td class="px-4 py-3">{{ $citizen->jenis_kelamin }}</td>
                    <td class="px-3 py-2">{{ $citizen->alamat }}</td>
                    <td class="px-4 py-3">{{ $citizen->rt }}/{{ $citizen->rw }}</td>
                    <td class="px-4 py-3">{{ $citizen->agama }}</td>
                    <td class="px-4 py-3">{{ $citizen->status_perkawinan }}</td>
                    <td class="px-4 py-3">{{ $citizen->pekerjaan }}</td>
                    <td class="px-4 py-3">{{ $citizen->kewarganegaraan }}</td>
                    <td class="px-4 py-3">{{ $citizen->pendidikan }}</td>
                    <td class="px-4 py-3 flex items-center">
                        <div class="flex items-center space-x-2">
                        <a href="{{ route('admin.citizens.edit', $citizen) }}" class="px-2 py-1 text-xs text-white bg-blue-600 rounded-lg hover:bg-blue-700">Edit</a>
                        <form action="{{ route('admin.citizens.destroy', $citizen) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 text-xs text-white bg-red-600 rounded-lg hover:bg-red-700" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4">
        {{ $citizens->appends(request()->query())->links() }}
    </div>
</div>
</div>

<!-- Import Modal -->
<div id="importModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Import Data Penduduk
                </h3>
                <button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" data-modal-toggle="importModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <form action="{{ route('admin.citizens.import') }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                @csrf
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload File Excel</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="file" accept=".xlsx,.xls,.csv" required>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Format file: XLSX, XLS, atau CSV</p>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 