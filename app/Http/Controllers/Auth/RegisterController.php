<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:owner,tenant',
        ]);

        // Check if email already exists
        $existingUser = User::where('email', $request->email)->first();
        
        if ($existingUser) {
            return back()->withErrors([
                'email' => 'Email sudah terdaftar. Silakan gunakan email lain atau login jika sudah memiliki akun.',
            ])->withInput($request->except('password', 'password_confirmation'));
        }

        // Create new user - this is truly a new registration
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Send email verification for new user
        event(new Registered($user));

        Auth::login($user);

        // Redirect to email verification notice
        return redirect()->route('verification.notice')->with('message', 
            'Akun berhasil dibuat! Silakan cek email Anda untuk verifikasi.');
    }
}