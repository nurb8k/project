<?php

namespace App\Http\Controllers\Client\Event;





use App\Http\Controllers\Controller;
use App\Models\Event;

class MainController extends Controller
{
 public function show(Event $event)
 {
     return view('client.events.show', compact('event'));
 }
}
