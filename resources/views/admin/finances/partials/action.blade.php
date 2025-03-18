<div class="flex items-center space-x-2">
    <a href="{{ route('admin.finances.show', $finance) }}" 
       class="px-2 py-1 text-xs text-white bg-blue-600 rounded-lg hover:bg-blue-700">
        Detail
    </a>
    <a href="{{ route('admin.finances.edit', $finance) }}" 
       class="px-2 py-1 text-xs text-white bg-yellow-600 rounded-lg hover:bg-yellow-700">
        Edit
    </a>
    <form action="{{ route('admin.finances.destroy', $finance) }}" method="POST" class="inline" 
          onsubmit="return confirm('Yakin hapus laporan ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-2 py-1 text-xs text-white bg-red-600 rounded-lg hover:bg-red-700">
            Hapus
        </button>
    </form>
</div> 