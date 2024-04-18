<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $user=Auth::user();



        if (Cache::has('events')){
            $events = Cache::get('events');
        }else{
            $events = Event::query()->get();
            Cache::put('events', $events, 1800);
        }

        if (Cache::has('events_created')){
            $events_created = Cache::get('events_created');
        }else{


            $events_created=$user->events_created;
            Cache::put('events_created', $events_created, 1800);
        }








        return view('user.index', compact('events', 'events_created'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::query()->get();

        return view('user.event-create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading'=>'required',
            'text'=>'required',
        ]);
        $event = Event::query()->create([
            'heading'=>$request->heading,
            'text'=>$request->text,
            'user_id'=>Auth::user()->id,
        ]);
        $event->participants()->sync($request->listeners);
        Cache::delete('event');
        Cache::delete('events_created');
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=Auth::user();

        if (Cache::has('events')){
            $events = Cache::get('events');

        }else{
            $events = Event::query()->get();

            Cache::put('events', $events, 1800);
        }

        if (Cache::has('events_created')){
            $events_created = Cache::get('events_created');

        }else{
            $events_created=$user->events_created;
            Cache::put('events_created', $events_created, 1800);
        }



        foreach ($events as $event){

            if ($event->id == $id){
                $event_select = $event;

                break;
            }
        }

        /*if (Cache::has('participants')){
            $participants = Cache::get('participants');

        }else{*/
            $participants=$event_select->participants;
            Cache::put('participants', $participants, 1800);







        return view('user.index', compact('events', 'events_created',  'event_select', 'participants'));
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
        $event = Event::query()->find($id);
        $event->participants()->sync([]);
        $event->delete();
        Cache::pull('event');
        Cache::pull('events_created');
        return redirect()->route('events.index');
    }
}
