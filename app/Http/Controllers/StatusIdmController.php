<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusIdmController extends Controller
{
    public function index()
    {
        
        return view('statistics.status-idm'); // Pastikan view ini ada
    }
}