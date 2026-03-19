<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Redirect to Microsoft
    public function redirect()
    {
        return Socialite::driver('microsoft')->redirect();
    }

    // Handle callback from Microsoft
    public function callback()
    {
        try {
            $msUser = Socialite::driver('microsoft')->user();
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Microsoft login failed.');
        }

        // Find or create user
        $user = User::where('email', $msUser->getEmail())->first();

        if (!$user) {
            return redirect('/')->with('error', 'Access denied. Your account is not registered in the system.');
        }

        if ($user->status !== 'active') {
            return redirect('/')->with('error', 'Your account is inactive. Contact the administrator.');
        }

        Auth::login($user);

        // Redirect based on role
        return match($user->role) {
            'admin'     => redirect()->route('admin.dashboard'),
            'judge'     => redirect()->route('judge.dashboard'),
            'sas'       => redirect()->route('sas.dashboard'),
            default     => redirect('/')->with('error', 'Unknown role assigned.'),
        };
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
