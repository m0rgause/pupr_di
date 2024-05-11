<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signIn()
    {
        return view('auth.signin');
    }

    public function signOut()
    {
        session()->forget('user');
        return redirect(route('signin'));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if ($user && password_verify($credentials['password'], $user->password)) {
            session(['user' => $user]);
            return redirect(route('dashboard'));
        } else {
            return redirect(route('signin'))->with('error', 'Username atau password salah');
        }
    }
}
