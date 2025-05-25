<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd('Hello!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('customer.akun.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name'              => ['required'],
            'email'             => ['required', 'email', 'max:254'],
            'email_verified_at' => ['nullable', 'date'],
            'password'          => ['nullable', Password::min(8), 'confirmed'],
            'profile_pic'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'remember_token'    => ['nullable'],
        ]);

        // Change Image
        if ($request->hasFile('profile_pic')) {
            $validatedData['profile_pic']   = $request->file('profile_pic')->store('images/profile/images', 'public');
        } else {
            $validatedData['profile_pic']   = $user->profile_pic;
        }

        // Change Password
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
