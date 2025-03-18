<x-user-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Profil Saya') }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/3 mb-6 md:mb-0">
                    <div class="flex flex-col items-center">
                        <img class="h-40 w-40 rounded-full object-cover mb-4" src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" alt="{{ Auth::user()->name }}">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ Auth::user()->name }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                        <a href="{{ route('user.profile.edit') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Edit Profil
                        </a>
                    </div>
                </div>
                <div class="md:w-2/3">
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                        <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Informasi Pribadi</h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Lengkap</p>
                                <p class="text-base text-gray-900 dark:text-gray-100">{{ Auth::user()->name }}</p>
                            </div>
                            
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</p>
                                <p class="text-base text-gray-900 dark:text-gray-100">{{ Auth::user()->email }}</p>
                            </div>
                            
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nomor Telepon</p>
                                <p class="text-base text-gray-900 dark:text-gray-100">{{ Auth::user()->phone ?? '-' }}</p>
                            </div>
                            
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">RT/RW</p>
                                <p class="text-base text-gray-900 dark:text-gray-100">{{ Auth::user()->RT ?? '-' }}/{{ Auth::user()->RW ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout> 