<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    // Tampilkan form register
    public function showRegister()
    {
        return view('auth.register');
    }    // Proses register user baru
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255',
            'password' => 'required|string|confirmed|min:6',
            'role'     => 'required|in:owner,tenant',
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
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        Auth::login($user);

        // Send email verification for new user only
        event(new Registered($user));

        // Redirect to email verification notice with success message
        return redirect()->route('verification.notice')->with('message', 
            'Akun berhasil dibuat! Silakan cek email Anda untuk verifikasi.');
    }

    // Tampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Check if email exists in database first
        $user = User::where('email', $credentials['email'])->first();
        
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak terdaftar. Silakan daftar terlebih dahulu.',
            ])->withInput($request->only('email'));
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();            // Cek apakah email sudah diverifikasi
            if (is_null($user->email_verified_at)) {
                return redirect()->route('verification.notice');
            }

            if ($user->role === 'owner') {
                return redirect('/admin');
            } else {
                return redirect('/');
            }
        }

        return back()->withErrors([
            'email' => 'Password salah.',
        ])->withInput($request->only('email'));
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
