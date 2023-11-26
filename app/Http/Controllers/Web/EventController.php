<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Event\EventStoreRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(EventStoreRequest $request)
    {
        Auth::user()->events()->create($request->validated());

        return redirect()->route('index');
    }

    public function show(Event $event)
    {
        return view('web.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('web.events.edit', compact('event'));
    }

    public function update(EventStoreRequest $request, Event $event)
    {
        $event->update($request->validated());

        return redirect()->route('index');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('index');
    }
}
