<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('web.events.index');
    }

    public function create()
    {
        return view('web.events.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
