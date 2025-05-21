<?php

namespace App\Http\Controllers;

use App\Models\PaketPernikahan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $paketPernikahans = PaketPernikahan::latest()->simplePaginate(4);

        return view('home', [
            'paketPernikahans' => $paketPernikahans,
        ]);
    }
}
