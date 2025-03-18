<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\Request;

class CitizenController extends Controller
{
    public function index()
    {
        $citizens = Citizen::all();
        return view('citizens.index', compact('citizens'));
    }

    public function show($id)
    {
        $citizen = Citizen::findOrFail($id);
        return view('citizens.show', compact('citizen'));
    }
}
