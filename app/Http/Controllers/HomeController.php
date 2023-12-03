<?php

namespace App\Http\Controllers;


use App\Models\Event;


class HomeController extends Controller
{
    public function index()
    {
        return view('client.dashboard');
    }
}
