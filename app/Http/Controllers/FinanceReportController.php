<?php

namespace App\Http\Controllers;

use App\Models\FinanceReport;
use Illuminate\Http\Request;

class FinanceReportController extends Controller
{
    public function index()
    {
        $events = FinanceReport::all();
        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        $event = FinanceReport::findOrFail($id);
        return view('events.show', compact('event'));
    }
}
