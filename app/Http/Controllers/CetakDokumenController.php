<?php

namespace App\Http\Controllers;

use App\jenisBelanja;
use Illuminate\Http\Request;
use App\Dokumen;
use Yajra\DataTables\DataTables;
use Excel;
use App\Exports\DataAsetExport;
use function GuzzleHttp\Promise\all;


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
//        dd($request->all());
        $record = jenisBelanja::find($request->id_jenis);
        $nama_jenis = $record->jenis_belanja;
        return Excel::download(new DataAsetExport($request->id_jenis, $request->tanggal), $nama_jenis.'.xlsx');
    }
}
