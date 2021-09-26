<?php

namespace App\Http\Controllers;

use App\Belanja;
use App\Dokumen;
use App\Instansi;
use App\jenisBelanja;
use App\Rekanan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $jenisBelanjas = jenisBelanja::orderBy('norek_jenis','ASC')->get();
        $dokumens = Dokumen::all();
        $rekanans = Rekanan::all();
        $data = Belanja::query()->orderBy('tanggal_sp2d','ASC');

        if($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('dokumen', function ($row) {
                    $dokumen = $row->Dokumen->keterangan_belanja;
                    return $dokumen;
                })
                ->addColumn('rekanan', function ($row) {
                    $rekanan = $row->rekanan->nama_rekanan;
                    return $rekanan;
                })
                ->make(true);
        }
        return view('layouts.cetakLaporan.index',[
            'belanjas' => $data,
        ], compact('dokumens', 'jenisBelanjas','rekanans'));
    }
}
