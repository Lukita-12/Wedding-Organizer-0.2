<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AkunController extends Controller
{
    public function index()
    {
        $users = User::latest()->simplePaginate(6);

        return view('admin.akun.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('admin.akun.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => ['required'],
            'role'              => ['required', 'in:customer,admin'],
            'email'             => ['required', 'email', 'max:254'],
            'email_verified_at' => ['nullable', 'date'],
            'password'          => ['required', Password::min(8), 'confirmed'],
            'remember_token'    => ['nullable'],
        ]);

        User::create($validatedData);

        return redirect()->route('admin.akun.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.akun.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name'              => ['required'],
            'role'              => ['required', 'in:customer,admin'],
            'email'             => ['required', 'email', 'max:254'],
            'email_verified_at' => ['nullable', 'date'],
            'password'          => ['nullable', Password::min(8), 'confirmed'],
            'remember_token'    => ['nullable'],
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('admin.akun.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.akun.index');
    }

    // Search
    public function search(Request $request)
    {
        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->simplePaginate(6);

        return view('admin.akun.index', [
            'users' => $users,
        ]);
    }
}
