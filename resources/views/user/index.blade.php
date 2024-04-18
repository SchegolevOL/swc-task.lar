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

                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>


        </div>
    </div>
    <!-- /.content-wrapper -->
    @endif
</div>
</body>
@endsection
