@extends('layouts.layout')
@section('content')
        @include('components.nav-bar')
        <div class="container">
        <form method="post" action="{{route('events.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">Heading</label>
                    <input type="text" class="form-control" id="" placeholder="Enter heading" name="heading">
                </div>
                <div class="form-group">
                    <label for="">Text</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
                </div>
                <div class="form-group">
                    <label>Listeners</label>
                    <select multiple="multiple" class="form-control" name="listeners[]">
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        </div>

@endsection
