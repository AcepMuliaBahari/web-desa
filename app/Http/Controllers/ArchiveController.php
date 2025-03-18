<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index()
    {
        $archives = Archive::all();
        return view('archives.index', compact('archives'));
    }

    public function show($id)
    {
        $archive = Archive::findOrFail($id);
        return view('archives.show', compact('archive'));
    }
}

