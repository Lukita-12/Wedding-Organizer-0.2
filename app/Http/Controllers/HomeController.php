<?php

namespace App\Http\Controllers;

use App\Models\PaketPernikahan;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $paketPernikahans   = PaketPernikahan::latest()->where('status_paket', 'Tersedia')->simplePaginate(3);
        $ulasans            = Ulasan::with('user')->latest()->simplePaginate(3);

        return view('home', [
            'paketPernikahans'  => $paketPernikahans,
            'ulasans'           => $ulasans,
        ]);
    }
}
