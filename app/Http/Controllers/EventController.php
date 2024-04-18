<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::query()->get();
        $user = Auth::user();
        $events_parteicipation = $user->events_parteicipation();
        $events_created=$user->events_created;

        return view('user.index', compact('events', 'events_created', 'events_parteicipation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event_select = Event::query()->find($id);
        $events = Event::query()->get();
        $user = Auth::user();
        $events_parteicipation = $user->events_parteicipation();
        $events_created=$user->events_created;

        return view('user.index', compact('events', 'events_created', 'events_parteicipation', 'event_select'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
