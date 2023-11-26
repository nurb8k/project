<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Event;


class HomeController extends Controller
{
    public function index()
    {
        $events = Event::query()->get();
        return view('web.index', compact('events'));
    }
}
