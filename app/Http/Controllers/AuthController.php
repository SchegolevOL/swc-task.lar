<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        $users = User::query()->get()->all();
        foreach ($users as $user){
            dump($user->vents_parteicipation);
        }
        dump(Auth::user());
    }

    public function create()
    {
        return view('auth.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'date_of_birth'=>'date',
            'login'=>'required|unique:users',
            'password'=>'required|confirmed',
        ]);

        $user = User::query()->create([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'login'=>$request->login,
            'date_of_birth'=>$request->date_of_birth,
            'password'=>Hash::make($request->password),
        ]);

        session()->flash('success', 'You have successfully registered');
        Auth::login($user);
        Cache::get('user', Auth::user());
        return redirect('/');
    }
    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'login'=>'required',
            'password'=>'required',
        ]);
        if (Auth::attempt(['login'=>$request->login, 'password'=>$request->password])){
            Cache::get('user', Auth::user());
            return redirect()->route('events.index');
        }

        return redirect()->back()->with('error', 'The email or password was entered incorrectly');

    }
    public function logout()
    {
        Cache::delete('user');
        Auth::logout();
        return redirect()->route('loginForm');
    }
}
