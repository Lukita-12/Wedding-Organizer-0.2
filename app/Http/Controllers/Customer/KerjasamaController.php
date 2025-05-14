<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KerjasamaController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // $kerjasamas = Kerjasama::with('requestMitra')->latest()->get();

        $kerjasamas = Kerjasama::with('requestMitra')
            ->whereHas('requestMitra.pelanggan', function ($query) {
                $query->where('user_id', Auth::id());
            })->latest()->get();

        return view('/customer.kerjasama.index', [
            'kerjasamas' => $kerjasamas,
        ]);
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
    public function show(Kerjasama $kerjasama)
    {
        $this->authorize('view', $kerjasama);

        return view('customer.kerjasama.show', [
            'kerjasama' => $kerjasama,
        ]);
    }

    public function edit(Kerjasama $kerjasama)
    {
        $this->authorize('update', $kerjasama);

        return view('/customer.kerjasama.edit', [
            'kerjasama' => $kerjasama,
        ]);
    }

    public function update(Request $request, Kerjasama $kerjasama)
    {
        $this->authorize('update', $kerjasama);

        $validatedData = $request->validate([
            'nama_pemilik'  => ['required'],
            'nama_usaha'    => ['required'],
            'jenis_usaha'   => ['required'],

            'noTelp_usaha'  => ['required'],
            'email_usaha'   => ['required', 'email', 'max:254'],
            'alamat_usaha'  => ['required'],
            'harga01'       => ['required', 'string'],
            'ket_harga01'   => ['required'],
            'harga02'       => ['required', 'string'],
            'ket_harga02'   => ['required'],
        ]);

        // Remove thousand separators (dots) and convert comma to decimal point
        $validatedData['harga01'] = str_replace(['.', ','], ['', '.'], $validatedData['harga01']);
        $validatedData['harga02'] = str_replace(['.', ','], ['', '.'], $validatedData['harga02']);
    
        // Convert to proper decimal format
        $validatedData['harga01'] = number_format((float) $validatedData['harga01'], 2, '.', '');
        $validatedData['harga02'] = number_format((float) $validatedData['harga02'], 2, '.', '');

        DB::transaction(function () use ($validatedData, $kerjasama) {
            $kerjasama->update([
                'noTelp_usaha'  => $validatedData['noTelp_usaha'],
                'email_usaha'   => $validatedData['email_usaha'],
                'alamat_usaha'  => $validatedData['alamat_usaha'],
                'harga01'       => $validatedData['harga01'],
                'ket_harga01'   => $validatedData['ket_harga01'],
                'harga02'       => $validatedData['harga02'],
                'ket_harga02'   => $validatedData['ket_harga02'],
            ]);
            
            $kerjasama->requestMitra->update([
                'nama_pemilik'  => $validatedData['nama_pemilik'],
                'nama_usaha'    => $validatedData['nama_usaha'],
                'jenis_usaha'   => $validatedData['jenis_usaha'],
            ]);
        });

        return redirect('/kerjasama');
    }

    public function destroy(Kerjasama $kerjasama)
    {
        $this->authorize('delete', $kerjasama);

        $kerjasama->delete();

        return redirect('/kerjasama');
    }
}
