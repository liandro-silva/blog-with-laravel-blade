<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function create()
    {
        return view('auth.create');
    }

    public function signup(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(8), 'confirmed'],
        ]);

        $user = User::create($attrs);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $attrs = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($attrs, $request->remember)) {
            throw ValidationException::withMessages(['email' => 'Invalid credentials']);
        }

        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Logged in successfully');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('auth.index')->with('success', 'Logged out successfully');
    }
}