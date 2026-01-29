@props(['action', 'itemName' => 'item', 'title' => 'Hapus Data'])

<div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50 backdrop-blur-sm animate-fade-in" onclick="if (event.target === this) closeDeleteModal()">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-md w-full transform transition-all duration-300 scale-100">
        <!-- Header -->
        <div class="flex items-center justify-center w-12 h-12 mx-auto mt-6 rounded-full bg-red-100 dark:bg-red-900">
            <svg class="w-6 h-6 text-red-600 dark:text-red-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 1.646a.5.5 0 0 0-.5.5v1.5H6a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-10a2 2 0 0 0-2-2h-3.5V2.146a.5.5 0 0 0-1 0v1.5H6v-.5a.5.5 0 0 0-1 0v.5H3a.5.5 0 0 0 0 1h1v10a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3h-1V2.146a.5.5 0 0 0-.5-.5z"/>
            </svg>
        </div>

        <!-- Body -->
        <div class="mt-4 text-center px-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $title }}</h3>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                Anda akan menghapus <span class="font-semibold text-gray-700 dark:text-gray-300">{{ $itemName }}</span>. Tindakan ini tidak dapat dibatalkan.
            </p>
        </div>

        <!-- Footer -->
        <div class="flex gap-3 mt-6 px-6 pb-6">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg transition-colors duration-200">
                Batal
            </button>
            <form action="{{ $action }}" method="POST" class="flex-1" id="deleteForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full px-4 py-2.5 text-sm font-medium text-white bg-red-600 hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-700 rounded-lg transition-colors duration-200">
                    Ya, Hapus
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function openDeleteModal(action, itemName = 'item') {
    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteForm').action = action;
    document.querySelector('[class*="text-gray-700 dark:text-gray-300"]').textContent = itemName;
    document.body.style.overflow = 'hidden';
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal on Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeDeleteModal();
    }
});
</script>
