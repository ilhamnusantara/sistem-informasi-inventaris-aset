<?php

namespace App\Http\Controllers;

use App\indukBelanja;
use Illuminate\Http\Request;

class IndukBelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'induk_belanja' => 'required|min:1',
            'norek_induk' => 'required|min:5',
        ]);
        $induk_belanja = new indukBelanja();
        $induk_belanja->induk_belanja = $request->induk_belanja;
        $induk_belanja->norek_induk = $request->norek_induk;
        $nama = $request->induk_belanja;
        $induk_belanja->save();
        return redirect()->route('jBelanja')->with('succes','Data ['.$nama.'] Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\indukBelanja  $indukBelanja
     * @return \Illuminate\Http\Response
     */
    public function show(indukBelanja $indukBelanja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\indukBelanja  $indukBelanja
     * @return \Illuminate\Http\Response
     */
    public function edit($id_induk)
    {
        $indukBelanja = indukBelanja::find($id_induk);
        return view('layouts.iBelanja.edit')->with('indukBelanja', $indukBelanja);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\indukBelanja  $indukBelanja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_induk)
    {
        $request->validate([
            'induk_belanja' => 'required|min:1',
            'norek_induk' => 'required|min:5',
        ]);
        $indukBelanja = indukBelanja::find($id_induk);
        $nama = $request->induk_belanja;
        $indukBelanja->induk_belanja = $request->induk_belanja;
        $indukBelanja->norek_induk = $request->norek_induk;

        $indukBelanja->save();
        return redirect()->route('jBelanja')->with('info','Data ['.$nama.'] Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\indukBelanja  $indukBelanja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_induk)
    {
        $indukBelanja = indukBelanja::find($id_induk);
        $nama = $indukBelanja->induk_belanja;
        $indukBelanja->delete();
        return redirect()->back()->with('error','Data ['.$nama.'] Dihapus');
    }
}
