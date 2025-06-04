<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserOtp;
use App\Mail\SendOtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function register(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password encrypted
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }


    public function showForgotForm()
    {
        return view('admin.forgotPass');
    }
    public function sendOTP(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found.']);
        }

        $otp = rand(100000, 999999);
        // Store OTP
        UserOtp::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(10)
        ]);
        $message = 'Your Otp is :';
        // Send email
        Mail::to($user->email)->send(new SendOtpMail($otp));


        return redirect()->route('verify.otp.form')->with('email', $user->email);
    }
    public function showOTPForm()
    {
        return view('admin.verifyOtp');
    }
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Invalid email']);
        }

        $otpData = UserOtp::where('user_id', $user->id)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (!$otpData) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP'])->withInput();
        }

        // OTP valid → Do something, e.g., allow password reset
        return view('auth.reset-password', ['email' => $user->email]);
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
