@extends('components.layout')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="max-w-4xl mx-auto text-center">
        <img src="{{ asset('images/error/404.svg') }}" alt="404 Error" class="w-96 mx-auto mb-8">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
            Halaman Tidak Ditemukan
        </h1>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-8">
            Maaf, halaman yang Anda cari tidak dapat ditemukan atau telah dipindahkan.
        </p>
        <a href="{{ route('desa') }}" class="inline-flex items-center px-5 py-3 text-base font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
            Kembali ke Beranda
            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</div>
@endsection 