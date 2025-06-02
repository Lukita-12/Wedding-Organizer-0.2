<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasans = Ulasan::with('user')->latest()->simplePaginate(6);

        return view('admin.ulasan.index', [
            'ulasans' => $ulasans,
        ]);
    }

    public function create()
    {
        $users = User::latest()->get();

        return view('admin.ulasan.create', [
            'users'  => $users
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'   => ['required', 'exists:users,id'],
            'ulasan'    => ['required'],
        ]);

        Ulasan::create($validatedData);

        return redirect()->route('admin.ulasan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ulasan $ulasan)
    {
        //
    }

    public function edit(Ulasan $ulasan)
    {
        $users = User::latest()->get();

        return view('admin.ulasan.edit', [
            'ulasan'=> $ulasan,
            'users'  => $users
        ]);
    }

    public function update(Request $request, Ulasan $ulasan)
    {
        $validatedData = $request->validate([
            'user_id'       => ['required', 'exists:users,id'],
            'upload_file'   => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'ulasan'        => ['required'],
        ]);

        if ($request->hasFile('upload_file')) {
            $validatedData['upload_file']   = $request->file('upload_file')->store('images/ulasan', 'public');
        } else {
            $validatedData['upload_file']   = $ulasan->upload_file;
        }

        $ulasan->update($validatedData);

        return redirect()->route('admin.ulasan.index');
    }

    public function destroy(Ulasan $ulasan)
    {
        $ulasan->delete();

        return redirect()->route('admin.ulasan.index');
    }

    // Search
    public function search(Request $request)
    {
        $search = $request->input('search');

        $ulasans = Ulasan::with('user')
            ->when($search, function ($query, $search) {
                $query->whereHas('user', function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%');
                });
            })->latest()->simplePaginate(6);

        return view('admin.ulasan.index', [
            'ulasans' => $ulasans,
        ]);
    }
}
