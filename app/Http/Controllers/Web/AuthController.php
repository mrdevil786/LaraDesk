<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Check if the user exists and is not blocked
        $user = User::where('email', $credentials['email'])->first();
        if ($user && $user->status === 'blocked') {
            return redirect()->route('view.login')->with('warning', 'Your account is blocked.');
        }

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'Successfully logged in.');
        }

        return redirect()->route('view.login')->with('error', 'Invalid credentials.');
    }


    public function logout()
    {
        Auth::guard('web')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('view.login')->with('success', 'Successfully logged out.');
    }
}
