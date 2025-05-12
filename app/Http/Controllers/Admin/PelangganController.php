<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::latest()->simplePaginate(6);

        return view('admin.pelanggan.index', [
            'pelanggans' => $pelanggans,
        ]);
    }

    public function create()
    {
        $users = User::latest()->get();

        return view('admin.pelanggan.create', [
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'           => ['required', 'exists:users,id'],
            'nama_pelanggan'    => ['required'],
            'jk_pelanggan'      => ['required', 'in:Laki-laki,Perempuan'],
            'noTelp_pelanggan'  => ['required'],
            'email_pelanggan'   => ['required', 'email'],
            'alamat_pelanggan'  => ['required'],
        ]);

        Pelanggan::create($validatedData);

        return redirect('/admin/pelanggan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    public function edit(Pelanggan $pelanggan)
    {
        $users = User::latest()->get();

        return view('admin.pelanggan.edit', [
            'pelanggan' => $pelanggan,
            'users'     => $users,
        ]);
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validatedData = $request->validate([
            'user_id'           => ['required', 'exists:users,id'],
            'nama_pelanggan'    => ['required'],
            'jk_pelanggan'      => ['required', 'in:Laki-laki,Perempuan'],
            'noTelp_pelanggan'  => ['required'],
            'email_pelanggan'   => ['required', 'email'],
            'alamat_pelanggan'  => ['required'],
        ]);

        $pelanggan->update($validatedData);

        return redirect('/admin/pelanggan');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()->route('admin.pelanggan.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $pelanggans = Pelanggan::when($search, function ($query, $search) {
            return $query->where('nama_pelanggan', 'like', '%' . $search . '%');
        })->simplePaginate(6);

        return view('admin.pelanggan.index', [
            'pelanggans' => $pelanggans,
        ]);
    }
}
