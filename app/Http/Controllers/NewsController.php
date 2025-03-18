<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    // Method untuk halaman publik berita
    public function publicIndex()
    {
        $news = News::latest()->paginate(9);
        $categories = News::distinct()->pluck('category')->toArray();
        return view('news.index', compact('news', 'categories'));
    }

    // Method untuk menampilkan detail berita
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    // Method baru untuk landing page
    public function getLatestNews()
    {
        $latestNews = News::latest()
            ->take(3)
            ->get();
        return $latestNews;
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('news', 'public');
            $validated['photo'] = $path;
        }

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($news->photo) {
                Storage::disk('public')->delete($news->photo);
            }
            $path = $request->file('photo')->store('news', 'public');
            $validated['photo'] = $path;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(News $news)
    {
        if ($news->photo) {
            Storage::disk('public')->delete($news->photo);
        }
        
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}

