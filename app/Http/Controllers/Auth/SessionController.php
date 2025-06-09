<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create()
    {
        return view('/auth.login');
    }

    public function store(Request $request)
    {
        // Validate
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attemp
        if (! Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, credentials does not match!'
            ]);
        };

        // Regenerate
        request()->session()->regenerate();

        // Redirect berdasarkan role
        $user = Auth::user();
        
        if ($user->role === 'admin') {
            return redirect()->route('dashboard'); // contoh: route untuk admin
        } elseif ($user->role === 'customer') {
            return redirect()->route('home'); // contoh: route untuk customer
        }

        // Redirect
        return redirect('/');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        Auth::logout();

        return redirect('/');
    }
}
