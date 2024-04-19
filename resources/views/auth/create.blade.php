@extends('layouts.layout')
@section('content')
    <div class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html">SWC</a>
        </div>
        @include('components.messages')
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="{{route('register.store')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{old('surname')}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="date" class="form-control" name="date_of_birth" value="{{old('date_of_birth')}}">
                    </div>




                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Login" name="login" value="{{old('login')}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-share" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa-sharp fa-light fa-right-to-bracket"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <a href="{{route('loginForm')}}" class="text-center">Login</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>

    </div>





@endsection
