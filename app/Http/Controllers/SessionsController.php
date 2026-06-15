<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($validated)) {
            $request->session()->regenerate();
            return back()
            ->withErrors(
                ['email' => 'the provided credentials do not match our record']
            )
            ->withInput();
        }
        $request->session()->regenerate();
        return redirect()->intended('/')
        ->with('success', 'You have logged in successfully');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/login');
    }
}