<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\Instansi;
use App\jenisBelanja;
use App\User;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $data = Dokumen::query();
        if ($user->status == 0){
            $data->where('instansi',null)->orWhere('instansi', $user->nama_instansi);
        }
        if($request->id_jenis){
            $data->where('id_jenis', $request->id_jenis);
        }
        if($request->min && $request->max ){
            $date_start = \Carbon\Carbon::parse(urldecode($request->min))->format('Y-m-d');
            $date_end = \Carbon\Carbon::parse(urldecode($request->max))->format('Y-m-d');
            $data->whereRaw('DATE(tgl_spk) BETWEEN DATE(?) AND DATE(?)', [$date_start, $date_end]);

        }
        if($request->ajax()){
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('jenis', function($row) {
                    $jenis = $row->jenisBelanja->jenis_belanja;
                    return $jenis;
                })
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
        $user = Auth::user();
        $request->validate([
            'keterangan_belanja' => 'required|min:1',
            'file_spk' => 'max:800',
            'file_bast' => 'max:800',
            'foto' => 'max:1000'
//            'rincian_belanja' => 'required|min:1',
//            'no_spk' => 'unique:dokumens|nullable',
//            'no_bast' => 'unique:dokumens|nullable',
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
        if ($request->colorRadio != $user->nama_instansi){
            $dokumen->instansi = $request->colorRadio;
        }elseif ($request->colorRadio == null){
            $dokumen->instansi = $request->colorRadio;
        }else{
            $dokumen->instansi = $request->colorRadio;
        }
        $dokumen->keterangan_belanja = $request->keterangan_belanja;
//        $dokumen->rincian_belanja = $request->rincian_belanja;
        $dokumen->no_spk = $request->no_spk;
        $dokumen->tgl_spk = $date_spk;
        $dokumen->no_bast = $request->no_bast;
        $dokumen->tgl_bast = $date_bast;
        $dokumen->merk = $request->merk;
        $dokumen->bahan = $request->bahan;
        $dokumen->type = $request->type;
        $dokumen->ukuran = $request->ukuran;
        $dokumen->alamat = $request->alamat;
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
        $dokumen = Dokumen::find($id_dokumen);
        $request->validate([
            'file_spk' => 'max:800',
            'file_bast' => 'max:800',
            'foto' => 'max:1000'
//            'rincian_belanja' => 'required|min:1',
//            'no_spk' => 'unique:dokumens|nullable',
//            'no_bast' => 'unique:dokumens|nullable',
        ]);
//        if($request->no_spk != $dokumen->no_spk ){
//            $request->validate([
//                'no_spk' => 'unique:dokumens',
//            ]);
//            $dokumen->no_spk = $request->no_spk;
//        }
//        if($request->no_bast != $dokumen->no_bast){
//            $request->validate([
//                'no_bast' => 'unique:dokumens',
//            ]);
//            $dokumen->no_bast = $request->no_bast;
//        }

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
        if ($request->tgl_spk != $dokumen->tgl_spk || $request->tgl_spk != null){
            $date_spk = \Carbon\Carbon::parse(urldecode($request->tgl_spk))->format('Y-m-d');
        }elseif($request->tgl_spk == null){
            $date_spk = null;
        }
        if ($request->tgl_bast != $dokumen->tgl_bast ||$request->tgl_bast != null){
            $date_bast = \Carbon\Carbon::parse(urldecode($request->tgl_bast))->format('Y-m-d');
        }elseif($request->tgl_bast == null){
            $date_bast = null;
        }
//        if ($request->tgl_spk != $dokumen->tgl_spk || $request->tgl_bast != $dokumen->tgl_bast){
//            if ($request->tgl_spk != $dokumen->tgl_spk || $request->tgl_spk != null){
//                $date_spk = \Carbon\Carbon::parse(urldecode($request->tgl_spk))->format('Y-m-d');
//            }
//            if ($request->tgl_bast != $dokumen->tgl_bast ||$request->tgl_bast != null){
//                $date_bast = \Carbon\Carbon::parse(urldecode($request->tgl_bast))->format('Y-m-d');
//            }
//        }

        $dokumen->id_jenis = $request->id_jenis;
        $dokumen->keterangan_belanja = $request->keterangan_belanja;
        $dokumen->instansi = $request->instansi;
//        $dokumen->rincian_belanja = $request->rincian_belanja;
        $dokumen->no_spk = $request->no_spk;
        $dokumen->tgl_spk = $date_spk;
        $dokumen->no_bast = $request->no_bast;
        $dokumen->tgl_bast = $date_bast;
        $dokumen->merk = $request->merk;
        $dokumen->bahan = $request->bahan;
        $dokumen->type = $request->type;
        $dokumen->ukuran = $request->ukuran;
        $dokumen->alamat = $request->alamat;
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
        File::delete(public_path('berkas/'.$dokumen->file_spk));
        File::delete(public_path('berkas/'.$dokumen->file_bast));
        File::delete(public_path('foto/'.$dokumen->foto));
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
