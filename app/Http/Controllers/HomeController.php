<?php

namespace App\Http\Controllers;





use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $events  = Event::query()->get();
        return view('web.dashboard', compact('events'));
    }
}
