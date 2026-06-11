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

        if (Auth::attempt($validated)) {
            return redirect('/')->with('success', 'Logged in successfully');
        }
        return redirect('/login');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/login');
    }
}
