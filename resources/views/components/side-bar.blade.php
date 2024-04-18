
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">EVENTS</li>
                @foreach($events as $event)
                    <li class="nav-item">
                        <a href="{{route('events.show', ['event'=>$event->id])}}" class="nav-link">

                            <p>
                                {{$event->heading}}
                            </p>


                        </a>
                    </li>
                @endforeach
                <li class="nav-header">CREATED EVENTS
                    <a href="{{route('events.create')}}" class="btn-primary">Created</a>
                </li>
                @foreach($events_created as $event)
                    <li class="nav-item">
                        <a href="{{route('events.show', ['event'=>$event->id])}}" class="nav-link">
                            <p>
                                {{$event->heading}}
                            </p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
