<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\u;

class HomeController extends Controller
{
    public function index(){
        $user = Auth::user();
        dd($user->events_created);
        return view('user.index');
    }
}
