<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{

    public function index()
    {

        $user=Auth::user();
        $events = $this->getEvents();
        $events_created = $this->getEeventsCreated($user);
        return view('user.index', compact('events', 'events_created', 'user'));
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

        $events = $this->getEvents();
        $events_created = $this->getEeventsCreated($user);


        foreach ($events as $event){

            if ($event->id == $id){
                $event_select = $event;

                break;
            }
        }

            $participants=$event_select->participants;
            Cache::put('participants', $participants, 1800);
        $is_participant = false;
        foreach ($participants as $participant){
            if ($participant->id == $user->id)
            {
                $is_participant=true;

                break;
            }
        }





        return view('user.index', compact('events', 'events_created',  'event_select', 'participants', 'is_participant'));
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
        $event = Event::query()->find($id);

        $user = Auth::user();
        $participants=$event->participants;


        if ($request->is_participant) {
            $participants->push($user);
        }else{
            for ($i = 0; $i < $participants->count(); $i++) {
                if ($participants[$i]->id == $user->id){
                    $participants->pull($i);

                }
            }
        }
        $event = Event::query()->find($id);
        $event->participants()->sync($participants);
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.0
 0     */
    public function destroy(string $id)
    {
        $event = Event::query()->find($id);
        $event->participants()->sync([]);
        $event->delete();
        Cache::pull('event');
        Cache::pull('events_created');
        return redirect()->route('events.index');
    }




    private function getEvents()
    {
        if (Cache::has('events')){
            $events = Cache::get('events');
        }else{
            $events = Event::query()->select('id','heading','text')->get();
            Cache::put('events', $events, 1800);
        }
        dump($events);
        return $events;
    }


    private function getEeventsCreated($user){
        if (Cache::has('events_created')){
            $events_created = Cache::get('events_created');
        }else{
            $events_created=$user->events_created;

            Cache::put('events_created', $events_created, 1800);
        }

        return $events_created;
    }




}
