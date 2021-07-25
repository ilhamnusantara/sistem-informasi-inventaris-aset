<?php

namespace App\Http\Controllers;

use App\Belanja;
use App\Dokumen;
use App\jenisBelanja;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $jenisBelanjas = jenisBelanja::all();
        $dokumens = Dokumen::all();
        $belanja = Belanja::all();
        return view('layouts.cetakLaporan.index',[
            'belanjas' => $belanja,
        ], compact('dokumens', 'jenisBelanjas'));
    }
}
