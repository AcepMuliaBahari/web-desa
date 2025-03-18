@props(['route', 'placeholder' => 'Cari...'])

<form action="{{ $route }}" method="GET" class="flex items-center">
    <label for="search" class="sr-only">Search</label>
    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
        <input type="text" name="search" id="search" value="{{ request('search') }}" 
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
            placeholder="{{ $placeholder }}">
    </div>
    <button type="submit" class="ml-2 text-gray-500 bg-primary-800 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
        Cari
    </button>
    @if(request('search'))
    <a href="{{ $route }}" class="ml-2 text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
        Reset
    </a>
    @endif
</form>