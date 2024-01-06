<?php

namespace App\Http\Controllers\Client\Event;





use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;

class MainController extends Controller
{
 public function show(Event $event)
 {
     return view('web.events.show', compact('event'));
 }

 public function create()
 {
     return view('web.events.create');
 }
}
