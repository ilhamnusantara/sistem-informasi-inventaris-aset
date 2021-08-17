<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\Instansi;
use App\jenisBelanja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;
use File;
use Yajra\DataTables\DataTables;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDokumen(Request $request){
        $jenisBelanjas = jenisBelanja::all();
//        $instansis = Instansi::all();
        $data = Dokumen::query();
        if($request->id_jenis){
            $data->where('id_jenis', $request->id_jenis);
        }

        if($request->min && $request->max ){
            $date_start = \Carbon\Carbon::parse(urldecode($request->min))->format('Y-m-d');
            $date_end = \Carbon\Carbon::parse(urldecode($request->max))->format('Y-m-d');
            $data->whereRaw('DATE(tgl_spk) BETWEEN DATE(?) AND DATE(?)', [$date_start, $date_end]);

        }

//        else{
//            $data = Dokumen::all();
//        }

        if($request->ajax()){
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('jenis', function($row) {
                    $jenis = $row->jenisBelanja->jenis_belanja;
                    return $jenis;
                })
//                ->addColumn('instansi', function($row) {
//                    $instansi = $row->instansi->nama_instansi;
//                    return $instansi;
//                })
                ->addColumn('action', function($row) {
                    if($row->status== 1 && $row->status_belanja == 0){
                        $btn = '<a class="btn bg-yellow btn-sm" href="'.route('dokumen.show', $row->id_dokumen).'"><i class="fas fa-search"></i></a>';
                        return $btn;
                    }elseif ($row->status == 1 && $row->status_belanja == 1){
                        $btn = '<a class="btn btn-success btn-sm" href="'.route('dokumen.show', $row->id_dokumen).'"><i class="fas fa-search"></i></a>';
                        return $btn;
                    }elseif ($row->status == 0 && $row->status_belanja == 0){
                        $btn = '<a class="btn btn-dark btn-sm" href="'.route('dokumen.show', $row->id_dokumen).'"><i class="fas fa-search"></i></a>';
                        return $btn;
                    }elseif ($row->status == 0 && $row->status_belanja == 1){
                        $btn = '<a class="btn btn-danger btn-sm" href="'.route('dokumen.show', $row->id_dokumen).'"><i class="fas fa-search"></i></a>';
                        return $btn;
                    }

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('layouts.dokumen.index',[
            'dokumens' => $data,
        ], compact('jenisBelanjas'));
    }

//    public function index(Request $request)
//    {
//        $dokumen = Dokumen::all();
//        $jenisBelanjas = jenisBelanja::all();
//
//        if($search = $request->get('search')){
//            $dokumen = Dokumen::where('keterangan_belanja','LIKE', "%{$search}%")->get();
//        }elseif ($search = $request->get('id_jenis')){
//            $dokumen = Dokumen::where('id_jenis','LIKE', "%{$search}%")->get();
//        }
//
//        return view('layouts.dokumen.index',[
//            'dokumens' => $dokumen,
//        ], compact('jenisBelanjas'));
//    }
    public function dataCetak()
    {
        return DataTables::of(Dokumen::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisBelanjas = jenisBelanja::all();
        $instansis = Instansi::all();
        return view('layouts.dokumen.create', compact('jenisBelanjas','instansis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'keterangan_belanja' => 'required|min:1',
            'rincian_belanja' => 'required|min:1',
            'no_spk' => 'unique:dokumens|nullable',
            'no_bast' => 'unique:dokumens|nullable',
        ]);

        $dokumen = new Dokumen();
        if($request->file('file_spk')){
            $file=$request->file('file_spk');
            $filename=$file->getClientOriginalName();
//            $request->file_spk->store('public/'. $filename);
            $request->file_spk->move(public_path('berkas'), $filename);
            $dokumen->file_spk =  $filename;
        }
        if($request->file('file_bast')){
            $file=$request->file('file_bast');
//            $filename=time().'.'.$file->getClientOriginalName();
            $filename=$file->getClientOriginalName();
//            $request->file_bast->move('storage/'. $filename);
            $request->file_bast->move(public_path('berkas'), $filename);
            $dokumen->file_bast =  $filename;
        }
        if($request->file('foto')){
            $file = $request->file('foto');
//            $foto = time().'.'.$request->foto->extension();
            $foto = $file->getClientOriginalName();
            $request->foto->move(public_path('foto'), $foto);
            $dokumen->foto = $foto;
        }
        $date_spk = null;
        $date_bast = null;
        if ($request->tgl_spk != null || $request->tgl_bast != null){
            if ($request->tgl_spk != null){
                $date_spk = \Carbon\Carbon::parse(urldecode($request->tgl_spk))->format('Y-m-d');
            }
            if ($request->tgl_bast != null){
                $date_bast = \Carbon\Carbon::parse(urldecode($request->tgl_bast))->format('Y-m-d');
            }
        }


        $dokumen->id_jenis = $request->id_jenis;
        $dokumen->instansi = $request->colorRadio;
        $dokumen->keterangan_belanja = $request->keterangan_belanja;
        $dokumen->rincian_belanja = $request->rincian_belanja;
        $dokumen->no_spk = $request->no_spk;
        $dokumen->tgl_spk = $date_spk;
        $dokumen->no_bast = $request->no_bast;
        $dokumen->tgl_bast = $date_bast;
        $dokumen->merk = $request->merk;
        $dokumen->bahan = $request->bahan;
        $dokumen->type = $request->type;
        $dokumen->ukuran = $request->ukuran;
        $dokumen->status = 0;
        $dokumen->status_belanja = 0;
        $dokumen->save();
//        return redirect()->route('dokumen');
        return redirect()->route('dokumen.show', $dokumen->id_dokumen);
//        $jenisBelanjas = jenisBelanja::all();
//        $dokumen = Dokumen::with('jenisBelanja')->find($dokumen->id_dokumen);
//        return view('layouts.dokumen.show',compact('jenisBelanjas'))->with('dokumen',$dokumen);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function show($id_dokumen)
    {
        $jenisBelanjas = jenisBelanja::all();
        $dokumen = Dokumen::with('jenisBelanja')->find($id_dokumen);
        return view('layouts.dokumen.show',compact('jenisBelanjas'))->with('dokumen', $dokumen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function edit($id_dokumen)
    {
        $jenisBelanjas = jenisBelanja::all();
        $instansis = Instansi::all();
        $dokumen = Dokumen::with('jenisBelanja')->find($id_dokumen);
        return view('layouts.dokumen.edit',compact('jenisBelanjas','instansis'))->with('dokumen', $dokumen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_dokumen)
    {

//        if($request->no_spk != $dokumen->no_spk || $request->no_spk != $dokumen->no_spk ){
//            $request->validate([
//                'no_spk' => 'required|unique:dokumens',
//                'no_bast' => 'required|unique:dokumens',
//            ]);
//        }
//        $dokumens = Dokumen::where('keterangan_belanja','LIKE', "%{$search}%")->get();
        $dokumen = Dokumen::find($id_dokumen);
        if($request->no_spk != $dokumen->no_spk ){
            $request->validate([
                'no_spk' => 'unique:dokumens',
            ]);
            $dokumen->no_spk = $request->no_spk;
        }
        if($request->no_bast != $dokumen->no_bast){
            $request->validate([
                'no_bast' => 'unique:dokumens',
            ]);
            $dokumen->no_bast = $request->no_bast;
        }
        if($request->file('file_spk')){
            $file=$request->file('file_spk');
            $filename=$file->getClientOriginalName();
            $request->file_spk->move(public_path('berkas'), $filename);
            File::delete(public_path('berkas/'.$dokumen->file_spk));
            $dokumen->file_spk =  $filename;
        }
        if($request->file('file_bast')){
            $file=$request->file('file_bast');
            $filename=$file->getClientOriginalName();
            $request->file_bast->move(public_path('berkas'), $filename);
            File::delete(public_path('berkas/'.$dokumen->file_bast));
            $dokumen->file_bast =  $filename;
        }
        if($request->file('foto')){
            $file = $request->file('foto');
            $foto = $file->getClientOriginalName();
            $request->foto->move(public_path('foto'), $foto);
            File::delete(public_path('foto/'.$dokumen->foto));
            $dokumen->foto = $foto;
        }
        $date_spk = \Carbon\Carbon::parse(urldecode($request->tgl_spk))->format('Y-m-d');
        $date_bast = \Carbon\Carbon::parse(urldecode($request->tgl_bast))->format('Y-m-d');

        $dokumen->id_jenis = $request->id_jenis;
        $dokumen->instansi = $request->instansi;
        $dokumen->keterangan_belanja = $request->keterangan_belanja;
        $dokumen->rincian_belanja = $request->rincian_belanja;
        $dokumen->tgl_spk = $date_spk;
        $dokumen->tgl_bast = $date_bast;
        $dokumen->merk = $request->merk;
        $dokumen->bahan = $request->bahan;
        $dokumen->type = $request->type;
        $dokumen->ukuran = $request->ukuran;
        $dokumen->save();
        return redirect()->route('dokumen.show',$dokumen->id_dokumen)->with('success','Data Telah Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dokumen)
    {
        $dokumen = Dokumen::find($id_dokumen);

        $dokumen->delete();
        return redirect()->route('dokumen')->with('warning','Data Terhapus');
    }

    public function verval($id_dokumen)
    {
        $dokumen = Dokumen::find($id_dokumen);
        $dokumen->status = 1;
        $dokumen->save();
        return redirect()->route('dokumen')->with('success','Tervalidasi');
    }

    public function noverval($id_dokumen)
    {
        $dokumen = Dokumen::find($id_dokumen);
        $dokumen->status = 0;
        $dokumen->save();
        return redirect()->back()->with('danger','Batal validasi');
    }

//    public function novervalbelanja($id_dokumen)
//    {
//        $dokumen = Dokumen::find($id_dokumen);
//        $dokumen->status = 0;
//        $dokumen
//    }
}
