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
        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attemp
        if (! Auth::attempt($validatedData)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, credentials does not match!'
            ]);
        };

        // Regenerate
        request()->session()->regenerate();

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
