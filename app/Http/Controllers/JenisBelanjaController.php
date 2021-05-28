<?php

namespace App\Http\Controllers;

use App\jenisBelanja;
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
        $jenis_belanja = jenisBelanja::all();
        return view('layouts.jBelanja.index',[
            'jenis_belanjas' => $jenis_belanja,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.jBelanja.create');
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
            'induk_belanja' => 'required|min:1',
            'sub_belanja' => 'required|min:1',
            'jenis_belanja' => 'required|min:1',
            'kategori' => 'required|min:1',
        ]);
        $jenis_belanja = new jenisBelanja();
        $jenis_belanja->id_jenis = $request->id_jenis;
        $jenis_belanja->induk_belanja = $request->induk_belanja;
        $jenis_belanja->sub_belanja = $request->sub_belanja;
        $jenis_belanja->jenis_belanja = $request->jenis_belanja;
        $jenis_belanja->kategori = $request->kategori;

        $jenis_belanja->save();
        return redirect()->route('jBelanja');
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
        $jenisBelanja = jenisBelanja::find($id_jenis);
        return view('layouts.jBelanja.edit')->with('jenisBelanja', $jenisBelanja);
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
            'induk_belanja' => 'required|min:1',
            'sub_belanja' => 'required|min:1',
            'jenis_belanja' => 'required|min:1',
            'kategori' => 'required|min:1'
        ]);
        $jenisBelanja = jenisBelanja::find($id_jenis);
        $jenisBelanja->induk_belanja = $request->induk_belanja;
        $jenisBelanja->sub_belanja = $request->sub_belanja;
        $jenisBelanja->jenis_belanja = $request->jenis_belanja;
        $jenisBelanja->kategori = $request->kategori;

        $jenisBelanja->save();
        return redirect()->route('jBelanja')->with('succes','Data Update');
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
        $jenisBelanja->delete();
        return redirect()->back()->with('warning','Data Terhapus');
    }
}
