<?php

namespace App\Http\Controllers;

use App\Models\{
    WebPage, News, Event, Resource, Umkm, Letter, Complaint, Citizen
};

class LandingPageController extends Controller
{
    public function index()
    {
        $webPages = WebPage::latest()->take(3)->get();
        $news = News::latest()->take(3)->get();
        $events = Event::latest()->take(3)->get();
        $resources = Resource::latest()->take(3)->get();
        $letters = Letter::all();
        $complaints = Complaint::all();
        $citizens = Citizen::all();
        $umkms = Umkm::all();

        return view('landingpage', compact(
            'webPages',
            'news',
            'events',
            'resources',
            'letters',
            'complaints',
            'citizens',
            'umkms'
        ));
    }
}
