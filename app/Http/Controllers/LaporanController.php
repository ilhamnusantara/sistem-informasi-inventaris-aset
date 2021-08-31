<?php

namespace App\Http\Controllers;

use App\Belanja;
use App\Dokumen;
use App\Instansi;
use App\jenisBelanja;
use App\Rekanan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $jenisBelanjas = jenisBelanja::all();
        $dokumens = Dokumen::all();
        $rekanans = Rekanan::all();
        $belanja = Belanja::all();
        return view('layouts.cetakLaporan.index',[
            'belanjas' => $belanja,
        ], compact('dokumens', 'jenisBelanjas','rekanans'));
    }
}
