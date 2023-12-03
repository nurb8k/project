<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Event\EventStoreRequest;
use App\Models\City;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::query()->simplePaginate();

        return view('admin.events.index',
            compact('events'))
            ->layout('layouts.admin');
    }

    public function create()
    {

        $cities = City::query()->get();
        return view('admin.events.create',compact('cities'))
            ->layout('layouts.admin');
    }

    public function store(EventStoreRequest $request)
    {
        Auth::user()->events()->create($request->validated());

        return redirect()->route('index');
    }

    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
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
