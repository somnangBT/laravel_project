<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login method
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         // Authentication passed
    //         return redirect()->route('home')->with('success', 'Login successful!');
    //     }

    //     // Authentication failed
    //     return back()->withErrors(['email' => 'Invalid credentials.']);
    // }

    // // Logout method
    // public function logout(Request $request)
    // {
    //     Auth::logout(); // Log the user out
    //     $request->session()->invalidate(); // Invalidate the session
    //     $request->session()->regenerateToken(); // Regenerate the CSRF token

    //     return redirect('/login')->with('success', 'You have been logged out.');
    // }
}
