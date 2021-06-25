<?php

namespace App\Http\Controllers;

use App\indukBelanja;
use App\jenisBelanja;
use App\subBelanja;
use Illuminate\Http\Request;

class JenisBelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indukBelanjas = indukBelanja::all();
        $subBelanjas = subBelanja::all();
        $jenis_belanja = jenisBelanja::all();
        return view('layouts.jBelanja.index',[
            'jenis_belanjas' => $jenis_belanja,
        ], compact('indukBelanjas','subBelanjas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indukBelanjas = indukBelanja::all();
        $subBelanjas = subBelanja::all();
        return view('layouts.jBelanja.create',compact('indukBelanjas','subBelanjas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = subBelanja::find($request->id_sub);
        $norek_sub = $record->norek_sub;
        $request->validate([
            'jenis_belanja' => 'required|min:1',
            'kategori' => 'required|min:1',
        ]);
        $jenis_belanja = new jenisBelanja();
        $jenis_belanja->jenis_belanja = $request->jenis_belanja;
        $jenis_belanja->kategori = $request->kategori;
        $jenis_belanja->norek_jenis = $norek_sub.'.'.$request->norek_jenis;
        $jenis_belanja->id_sub = $request->id_sub;
        $nama = $request->jenis_belanja;
        $jenis_belanja->save();
        return redirect()->route('jBelanja')->with('succes','Data ['.$nama.'] Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jenisBelanja  $jenisBelanja
     * @return \Illuminate\Http\Response
     */
    public function show(jenisBelanja $jenisBelanja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jenisBelanja  $jenisBelanja
     * @return \Illuminate\Http\Response
     */
    public function edit($id_jenis)
    {
        $indukBelanjas = indukBelanja::all();
        $subBelanjas = subBelanja::all();
        $jenisBelanja = jenisBelanja::with('subBelanja')->find($id_jenis);
        return view('layouts.jBelanja.edit',compact('indukBelanjas','subBelanjas'))->with('jenisBelanja', $jenisBelanja);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jenisBelanja  $jenisBelanja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jenis)
    {
        $request->validate([
            'jenis_belanja' => 'required|min:1',
            'norek_jenis' => 'required|min:5',
            'kategori' => 'required|min:1',
        ]);
        $jenisBelanja = jenisBelanja::find($id_jenis);
        $jenisBelanja->id_sub = $request->id_sub;
        $jenisBelanja->jenis_belanja = $request->jenis_belanja;
        $jenisBelanja->norek_jenis = $request->norek_jenis;
        $jenisBelanja->kategori = $request->kategori;
        $nama = $request->jenis_belanja;
        $jenisBelanja->save();
        return redirect()->route('jBelanja')->with('info','Data ['.$nama.'] Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jenisBelanja  $jenisBelanja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis)
    {
        $jenisBelanja = jenisBelanja::find($id_jenis);
        $nama = $jenisBelanja->jenis_belanja;
        $jenisBelanja->delete();
        return redirect()->back()->with('error','Data ['.$nama.'] Dihapus');
    }
}
