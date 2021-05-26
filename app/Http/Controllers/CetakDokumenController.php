<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use Yajra\DataTables\DataTables;

class CetakDokumenController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::all();
        return view('layouts.cetakDokumen.index',[
            'dokumens' => $dokumen,
        ]);
    }

    public function dataCetak()
    {
        return DataTables::of(Dokumen::query())->make(true);
    }

    public function downloadFile($namafile)
    {
        return response()->file(public_path("berkas/{$namafile}"));
    }
    public function downloadFoto($namafile)
    {
        //download foto
//        $request->foto->move(public_path('foto'), $foto);
//        $file = public_path('foto')->get($namafile);
        return response()->download(public_path("foto/{$namafile}"));
    }
}
