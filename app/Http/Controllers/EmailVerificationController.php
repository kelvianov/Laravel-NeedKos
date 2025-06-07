<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class EmailVerificationController extends Controller
{
    /**
     * Display the email verification notice.
     */
    public function notice()
    {
        return view('auth.verify-email');
    }    /**
     * Handle email verification.
     */
    public function verify(Request $request): RedirectResponse
    {
        $user = $request->user();
        
        if (!hash_equals((string) $request->route('id'), (string) $user->getKey())) {
            abort(403);
        }

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            abort(403);
        }        if (!is_null($user->email_verified_at)) {
            if ($user->role === 'owner') {
                return redirect('/admin')->with('verified', true);
            } else {
                return redirect('/')->with('verified', true);
            }
        }

        // Mark email sebagai verified
        $user->email_verified_at = now();
        $user->save();
        
        event(new \Illuminate\Auth\Events\Verified($user));

        // Redirect berdasarkan role setelah verifikasi
        if ($user->role === 'owner') {
            return redirect('/admin')->with('verified', true);
        } else {
            return redirect('/')->with('verified', true);
        }
    }

    /**
     * Resend email verification notification.
     */
    public function resend(Request $request): RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'Email verifikasi telah dikirim ulang!');
    }
}