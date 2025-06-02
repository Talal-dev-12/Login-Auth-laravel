<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function register() {}
    public function sendOTP(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found.']);
        }

        $otp = rand(100000, 999999);
        $user->update(['otp' => $otp]); // You must add 'otp' column to your users table

        // Send email
        Mail::to($user->email)->send(new SendOtpMail($otp));

        return redirect()->route('verify.otp.form')->with('email', $user->email);
    }
    public function verifyOTP(Request $request)
    {
        $user = User::where('email', $request->email)->where('otp', $request->otp)->first();

        if (!$user) {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }

        return redirect()->route('reset.password.form')->with('email', $user->email);
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->update([
            'password' => Hash::make($request->password),
            'otp' => null // Clear OTP after success
        ]);

        return redirect('/login')->with('success', 'Password has been reset.');
    }
}
