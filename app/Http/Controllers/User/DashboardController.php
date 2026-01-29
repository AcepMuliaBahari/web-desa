<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\View\View;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    /**
     * Display the user dashboard view.
     */
    public function index(): View
    {
        $complaints = collect();
        if (Schema::hasColumn('complaints', 'user_id')) {
            $complaints = Complaint::where('user_id', auth()->id())
                ->latest()
                ->take(5)
                ->get();
        }

        return view('user.dashboard', compact('complaints'));
    }
}
