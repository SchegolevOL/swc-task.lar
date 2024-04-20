@extends('layouts.layout')
@section('content')
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        @include('components.nav-bar')
        @include('components.side-bar')

        @if(isset($event_select))
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$event_select->heading}}</h5>

                            <p class="card-text">
                                {{$event_select->text}}
                            </p>
                            @foreach($participants as $participant)
                                <div>{{$participant->name}} | {{$participant->surname}}</div>

                            @endforeach



                            @if($event_select->user_id == $user->id)
                                <form action="{{route('events.destroy', ['event'=>$event_select->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn bg-danger">Delete</button>
                                </form>
                            @endif


                            <form action="{{route('events.update', ['event'=>$event_select->id])}}" method="post">

                                @method('PUT')
                                @csrf

                                @if($is_participant)
                                    <input type="hidden" name="is_participant"
                                           id="inputID" value="0" >

                                    <button type="submit" class="btn bg-primary">join</button>
                                @else
                                    <input type="hidden" name="is_participant"
                                           id="inputID" value="1" >


                                    <button type="submit" class="btn bg-green">out</button>
                                @endif
                            </form>


                        </div>
                    </div>


                </div>
            </div>
            <!-- /.content-wrapper -->
        @endif
    </div>
    </body>
@endsection
