<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.form');
    }

    public function store(NewsRequest $request)
    {
        $validated = $request->validated();
        
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('news', 'public');
            $validated['photo'] = $path;
        }

        $validated['is_published'] = (bool) $request->input('is_published');

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.form', compact('news'));
    }

    public function update(NewsRequest $request, News $news)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($news->photo) {
                Storage::disk('public')->delete($news->photo);
            }
            $path = $request->file('photo')->store('news', 'public');
            $validated['photo'] = $path;
        }

        $validated['is_published'] = (bool) $request->input('is_published');

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