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
    public function index(Request $request)
    {
        $data = Dokumen::query();
        if($request->file_spk == 1){
            $data->orWhere('file_spk', null);
        }
        if($request->file_bast == 1){
            $data->orWhere('file_bast', null);
        }
        if($request->foto ==  1){
            $data->orWhere('foto', null);
        }
        if($request->ajax()){
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('file_spk', function($row) {
                    if ($row->file_spk != null){
                        $data_spk = '<a href="'.route('cetakDok.file', ['namafile' => $row->file_spk]).'" target="_blank">Download</a>';
                        return $data_spk;
                    }else{
                        $data_spk = '<div class="text-red">Belum Upload SPK</div>';
                        return $data_spk;
                    }
                })
                ->addColumn('file_bast', function($row) {
                    if ($row->file_bast != null){
                        $data_bast = '<a href="'.route('cetakDok.file', ['namafile' => $row->file_bast]).'" target="_blank">Download</a>';
                        return $data_bast;
                    }else{
                        $data_bast = '<div class="text-red">Belum Upload BAST</div>';
                        return $data_bast;
                    }
                })
                ->addColumn('foto', function($row) {
                    if ($row->foto != null){
                        $data_foto = '<a href="'.route('cetakDok.foto', ['namafoto' => $row->foto]).'">Download</a>';
                        return $data_foto;
                    }else{
                        $data_foto = '<div class="text-red">Belum Upload Foto</div>';
                        return $data_foto;
                    }
                })
                ->rawColumns(['file_spk','file_bast','foto'])
                ->make(true);
        }
//        $dokumen = Dokumen::all();
        return view('layouts.cetakDokumen.index',[
            'dokumens' => $data,
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
