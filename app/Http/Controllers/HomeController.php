<?php

namespace App\Http\Controllers;

use App\Models\PaketPernikahan;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $paketPernikahans   = PaketPernikahan::latest()->simplePaginate(4);
        $ulasans            = Ulasan::with('user')->latest()->simplePaginate(6);

        return view('home', [
            'paketPernikahans'  => $paketPernikahans,
            'ulasans'           => $ulasans,
        ]);
    }
}
