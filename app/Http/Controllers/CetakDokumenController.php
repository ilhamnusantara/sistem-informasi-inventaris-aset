<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use Yajra\DataTables\DataTables;
use Excel;
use App\Exports\DataAsetExport;


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

    public function export(Request $request)
    {
        return Excel::download(new DataAsetExport($request->id_jenis), 'aset.xlsx');
    }
}
