<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        // Check if the previous URL is not the login URL to avoid redirecting back to login
        if (url()->previous() !== route('login')) {
            session(['url.intended' => url()->previous()]);
        }

        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->role_id != 2) {
                return redirect()->route('dashboard');
            }
            return redirect()->to(session('url.intended', url()->previous()));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    // Show register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle registration request
    public function register(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => 2,
            'password' => Hash::make($request->password),
        ]);

        Auth::attempt($request->only('email', 'password'));

        return redirect('/'); // Ganti 'dashboard' sesuai route tujuan setelah register
    }

    // Handle logout request
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
