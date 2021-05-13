<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\jenisBelanja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumen = Dokumen::all();
        $jenisBelanjas = jenisBelanja::all();

        $search = request()->query('search');
        if($search){
            $dokumen = Dokumen::where('keterangan_belanja','LIKE', "%{$search}%");
        }else{

        }

        return view('layouts.dokumen.index',[
            'dokumens' => $dokumen,
        ], compact('jenisBelanjas'));
//        return view('layouts.jBelanja.index',[
//            'jenis_belanjas' => $jenis_belanja,
//        ]);
    }

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
//        $request->validate([
//            'keterangan_belanja' => 'required|min:1',
//            'rincian_belanja' => 'required|min:1',
//            'no_spk' => 'required|min:1',
//        ]);

        $dokumen = new Dokumen();
        if($request->file('file_spk')){
            $file=$request->file('file_spk');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file_spk->move('storage/'. $filename);
            $dokumen->file_spk =  $filename;
        }
        if($request->file('file_bast')){
            $file=$request->file('file_bast');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file_bast->move('storage/'. $filename);
            $dokumen->file_bast =  $filename;
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

    public function download(Request $request)
    {
//        return response()->download('storage/'.$request->file_spk);
//        try {
//            return Storage::disk('local')->download('public/'.$request->file_spk.'/');
//        }catch (\Exception $e){
//            return $e->getMessage();
//        }
//        $path = public_path($request->file_spk.'');
//        return response()->download($path);
//        if(Storage::disk('public')->exists(''.$request->file_spk)){
//            $path = Storage::disk('public')->path(''.$request->file_spk);
//            $content = file_get_contents($path);
//            return response($content)->withHeaders([
//                'Content-Type' => mime_content_type($path)
//            ]);
//            return redirect('/404');
//        }
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
        $dokumen = Dokumen::find($id_dokumen);
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
            $request->file_spk->store('public/'. $filename);
            $dokumen->file_spk =  $filename;
        }
        if($request->file('file_bast')){
            $file=$request->file('file_bast');
            $filename=time().'.'.$file->getClientOriginalName();
            $request->file_bast->move('storage/'. $filename);
            $dokumen->file_bast =  $filename;
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

    public function search(Request $request)
    {
        $jenisBelanjas = jenisBelanja::all();
        $cari = $request -> search;
        $dokumen = Dokumen::where('keterangan_belanja','like',"%".$cari."%");
        return view('layouts.dokumen.index',['dokumens' => $dokumen], compact('jenisBelanjas'));
    }
}
