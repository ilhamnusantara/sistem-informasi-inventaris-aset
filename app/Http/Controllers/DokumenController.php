<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\jenisBelanja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    public function index(Request $request)
    {
        $dokumen = Dokumen::all();
        $jenisBelanjas = jenisBelanja::all();

        if($search = $request->get('search')){
            $dokumen = Dokumen::where('keterangan_belanja','LIKE', "%{$search}%")->get();
        }elseif ($search = $request->get('id_jenis')){
            $dokumen = Dokumen::where('id_jenis','LIKE', "%{$search}%")->get();
        }

        return view('layouts.dokumen.index',[
            'dokumens' => $dokumen,
        ], compact('jenisBelanjas'));
    }
    public function dataCetak()
    {
        return DataTables::of(Dokumen::query())->make(true);
    }

//    public function filter(Request $request)
//    {
//        dd($request->all());
//        $jenisBelanjas = jenisBelanja::all();
//        $search = $request->search;
//        $dokumens = DB::table('dokumens')->where('keterangan_belanja', 'like', '%'.$search.'%');
//        return view('layouts.dokumen.index', ['dokumens'=>$dokumens],compact('jenisBelanjas'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisBelanjas = jenisBelanja::all();
        return view('layouts.dokumen.create', compact('jenisBelanjas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'keterangan_belanja' => 'required|min:1',
            'rincian_belanja' => 'required|min:1',
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

        $dokumen->id_jenis = $request->id_jenis;
        $dokumen->keterangan_belanja = $request->keterangan_belanja;
        $dokumen->rincian_belanja = $request->rincian_belanja;
        $dokumen->no_spk = $request->no_spk;
        $dokumen->tgl_spk = $request->tgl_spk;
        $dokumen->no_bast = $request->no_bast;
        $dokumen->tgl_bast = $request->tgl_bast;
        $dokumen->merk = $request->merk;
        $dokumen->bahan = $request->bahan;
        $dokumen->type = $request->type;
        $dokumen->ukuran = $request->ukuran;
        $dokumen->save();
        return redirect()->route('dokumen');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
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
        $dokumen = Dokumen::with('jenisBelanja')->find($id_dokumen);
        return view('layouts.dokumen.edit',compact('jenisBelanjas'))->with('dokumen', $dokumen);
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

        $dokumen->id_jenis = $request->id_jenis;
        $dokumen->keterangan_belanja = $request->keterangan_belanja;
        $dokumen->rincian_belanja = $request->rincian_belanja;
        $dokumen->no_spk = $request->no_spk;
        $dokumen->tgl_spk = $request->tgl_spk;
        $dokumen->no_bast = $request->no_bast;
        $dokumen->tgl_bast = $request->tgl_bast;
        $dokumen->merk = $request->merk;
        $dokumen->bahan = $request->bahan;
        $dokumen->type = $request->type;
        $dokumen->ukuran = $request->ukuran;
        $dokumen->save();
        return redirect()->route('dokumen')->with('success','Data Telah Di Update');
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
        return redirect()->back()->with('warning','Data Terhapus');
    }
}
