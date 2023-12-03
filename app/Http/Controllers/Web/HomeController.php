<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        dd(Auth::user());
        $events = Event::query()->get();
        return view('web.index', compact('events'));
    }
}
