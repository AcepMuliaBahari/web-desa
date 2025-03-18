@props(['showRoute', 'editRoute', 'deleteRoute'])

<div class="flex items-center space-x-2">
    <a href="{{ $showRoute }}" 
       class="px-2 py-1 text-xs text-gray-700 bg-blue-600 rounded-lg hover:bg-blue-700">
        Detail
    </a>
    <a href="{{ $editRoute }}" 
       class="px-2 py-1 text-xs text-gray-700 bg-yellow-600 rounded-lg hover:bg-yellow-700">
        Edit
    </a>
    <form action="{{ $deleteRoute }}" method="POST" class="inline" 
          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-2 py-1 text-xs text-gray-700 bg-yellow-600 rounded-lg hover:bg-red-700">
            Hapus
        </button>
    </form>
</div> 