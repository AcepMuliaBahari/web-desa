<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($regulations->where('category', 'perdes') as $regulation)
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 line-clamp-2 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                    {{ $regulation->title }}
                </h3>
                <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                    <p class="flex items-center gap-3">
                        <i class="fas fa-hashtag text-blue-500 dark:text-blue-400"></i>
                        <span class="font-medium">{{ $regulation->number ?: '-' }}</span>
                    </p>
                    <p class="flex items-center gap-3">
                        <i class="fas fa-calendar-alt text-blue-500 dark:text-blue-400"></i>
                        <span class="font-medium">{{ $regulation->date_enacted->isoFormat('D MMMM Y') }}</span>
                    </p>
                </div>
                <div class="mt-6 flex justify-between items-center">
                    <a href="{{ route('regulations.show', $regulation->id) }}" 
                       class="text-blue-600 dark:text-blue-400 font-medium hover:underline">
                        Lihat Detail
                    </a>
                    @if($regulation->file_path)
                        <a href="{{ route('regulations.download', $regulation->id) }}" 
                           class="flex items-center text-gray-700 dark:text-gray-300 font-medium hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                            <i class="fas fa-download mr-2"></i> Download PDF
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
