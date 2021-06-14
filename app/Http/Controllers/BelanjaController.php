<?php

namespace App\Http\Controllers;

use App\Belanja;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $belanja = Belanja::all();

        return view('layouts.belanja.index',[
            'belanjas' => $belanja,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.belanja.create');
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
            'id_belanja' => 'required',
            'id_dokumen' => 'required',
            'no_pbb_ls' => 'required',
            'rekanan' => 'required',
            'nominal_belanja' => 'required',
            'tanggal_belanja' => 'required',
            'sp2d' => 'required',
            'tanggal_sp2d' => 'required',
            'status' => 'required'
        ]);
        Belanja::create($request->all());
        return redirect()->route('belanja.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Belanja  $belanja
     * @return \Illuminate\Http\Response
     */
    public function show(Belanja $belanja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Belanja  $belanja
     * @return \Illuminate\Http\Response
     */
    public function edit(Belanja $belanja)
    {
        return view('layouts.belnja.edit', compact('belanja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Belanja  $belanja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Belanja $belanja)
    {
        $request->validate([
            'id_belanja' => 'required',
            'id_dokumen' => 'required',
            'no_pbb_ls' => 'required',
            'rekanan' => 'required',
            'nominal_belanja' => 'required',
            'tanggal_belanja' => 'required',
            'sp2d' => 'required',
            'tanggal_sp2d' => 'required',
            'status' => 'required'
        ]); 
        $belanja->update($request->all());
        return redirect()->route('belanja.index')->with('success', 'Transaksi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Belanja  $belanja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Belanja $belanja)
    {
        $belanja->delete();
        return redirect()->route('belanja.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
