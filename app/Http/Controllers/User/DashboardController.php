<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the user dashboard view.
     */
    public function index(): View
    {
        $complaints = Complaint::where('user_id', auth()->id())
            ->latest()
            ->take(5)
            ->get();

        return view('user.dashboard', compact('complaints'));
    }
}
