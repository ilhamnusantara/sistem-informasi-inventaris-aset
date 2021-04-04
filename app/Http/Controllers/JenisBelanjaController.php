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
        $request->validate([
            'id_jenis' => 'required|min:1',
            'induk_jenis' => 'required|min:1',
            'nama_jenis' => 'required|min:1',
        ]);
        $jenis_belanja = new jenisBelanja();
        $jenis_belanja->id_jenis = $request->id_jenis;
        $jenis_belanja->induk_jenis = $request->induk_jenis;
        $jenis_belanja->nama_jenis = $request->nama_jenis;

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
    public function edit(jenisBelanja $jenisBelanja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jenisBelanja  $jenisBelanja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jenisBelanja $jenisBelanja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jenisBelanja  $jenisBelanja
     * @return \Illuminate\Http\Response
     */
    public function destroy(jenisBelanja $jenisBelanja)
    {
        //
    }
}
