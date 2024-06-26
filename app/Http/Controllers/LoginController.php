<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {

        if ($user = Auth::user()) {
            dd($user->role);
            if ($user->role == 'admin' || $user->role == 'bidan') {
                return redirect()->route('dashboard');
            }
        }

        return view('pages.auth-login');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $kredensial = $request->only('email', 'password');

        if (Auth::attempt($kredensial)) {

            $request->session()->regenerate();
            $user = Auth::user();
            dd($user->role);

            if ($user->status == 'admin' || $user->status == 'bidan') {
                return redirect()->intended('/dashboard-general-dashboard');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Maaf email atau password anda salah'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
