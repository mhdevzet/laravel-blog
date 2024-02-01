<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Register Function
    public function register()
    {
        return view('register');
    }

    // Register Post Function
    public function registerPost(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Register successfully');
    }

    // Login Function
    public function login()
    {
        return view('login');
    }

    // Login Post Function
    public function loginPost(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/blog')->with('success', 'Login Successfully');
        }

        return back()->with('error', 'Email or Password wrong');
    }

    // Logout Function
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
