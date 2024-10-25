<?php
// VerificationController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class VerificationController extends Controller
{
    // ...

    public function show()
    {
        return view('auth.verify-email');
    }


    public function verifyEmail($token)
    {
        $user = User::where('verification_token', $token)->first();

        if ($user) {
            $user->email_verified_at = now();
            $user->verification_token = null;
            $user->save();

            return redirect()->route('login')->with('status', 'Email verification successful. You can now login.');
        }

        return redirect()->route('login')->with('status', 'Invalid verification token.');
    }
    
    public function verify(Request $request)
    {
        $request->user()->markEmailAsVerified();

        return redirect($this->redirectPath())->with('verified', true);
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }

    // ...
}
