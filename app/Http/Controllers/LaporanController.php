<?php

namespace App\Http\Controllers;

use App\Belanja;
use App\Dokumen;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::all();
        $belanja = Belanja::all();
        return view('layouts.cetakLaporan.index',[
            'belanjas' => $belanja,
        ], compact('dokumens'));
    }
}
