<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $admin = (Auth::user());
        return view('admin.index', compact('admin'));
    }

    public function registerForm(){
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'email',
            'check' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success', 'Successful registration');
        Auth::login($user);
        return redirect('admin');
    }

    public function loginForm(){
        return view('admin.login');
    }

    public function login(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'check' => 'required',
        ]);

        if (Auth::attempt([
            'name' => $request->name,
            'password' => $request->password,
        ])) {
            return redirect('admin');
        }
        return redirect()->back()->with('error', 'Incorrect login or password');
    }

    public function logout(){
        Auth::logout();
        return redirect()->home();
    }
}
