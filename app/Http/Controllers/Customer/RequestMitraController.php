<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\RequestMitra;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestMitraController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return view('/customer.request_mitra.index');
    }

    public function create()
    {
        $user = Auth::user();
        $customers = $user->pelanggan;
        
        // Determine if the user has customer data
        $hasCustomer = $customers->isNotEmpty();

        return view('/customer.request_mitra.create', [
            'customers'     => $customers,
            'hasCustomer'   => $hasCustomer,
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'pelanggan_id'  => ['required', 'exists:pelanggan,id'],
            'nama_usaha'    => ['required', 'string', 'max:254'],
            'jenis_usaha'   => ['required'],
            'nama_pemilik'  => ['required'],
        ]);

        $customer = $user->pelanggan->where('id', $validatedData['pelanggan_id'])->first();
        if (!$customer) {
            return redirect()->back()->withErrors([
                'pelanggan_id' => 'Informasi pelanggan yang dipilih bukan milik anda!',
            ]);
        }

        Requestmitra::create([
            'pelanggan_id'  => $validatedData['pelanggan_id'],
            'nama_usaha'    => $validatedData['nama_usaha'],
            'jenis_usaha'   => $validatedData['jenis_usaha'],
            'nama_pemilik'  => $validatedData['nama_pemilik'],
        ]);

        return redirect('/request-mitra');
    }

    public function show(RequestMitra $requestMitra)
    {
        $this->authorize('view', $requestMitra);

        dd('Not implement yet!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestMitra $requestMitra)
    {
        // $this->authorize('update', $requestMitra);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequestMitra $requestMitra)
    {
        // $this->authorize('update', $requestMitra);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestMitra $requestMitra)
    {
        // $this->authorize('delete', $requestMitra);
        //
    }
}
