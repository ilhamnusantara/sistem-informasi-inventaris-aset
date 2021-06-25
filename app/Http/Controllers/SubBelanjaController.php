<?php

namespace App\Http\Controllers;

use App\indukBelanja;
use App\subBelanja;
use Illuminate\Http\Request;

class SubBelanjaController extends Controller
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
        return view('layouts.sBelanja.index',[
            'subBelanjas' => $subBelanjas,
        ], compact('indukBelanjas'));
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
        $record = indukBelanja::find($request->id_induk);
        $norek_induk = $record->norek_induk;
        $request->validate([
            'sub_belanja' => 'required|min:1',
            'norek_sub' => 'required|min:1',
        ]);
        $sub_belanja = new subBelanja();
        $sub_belanja->sub_belanja = $request->sub_belanja;
//        $sub_belanja->norek_sub = $request->norek_sub;
        $sub_belanja->norek_sub = $norek_induk.'.'.$request->norek_sub;
        $sub_belanja->id_induk = $request->id_induk;
        $nama= $request->sub_belanja;
        $sub_belanja->save();
        return redirect()->route('jBelanja')->with('succes','Data ['.$nama.'] Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subBelanja  $subBelanja
     * @return \Illuminate\Http\Response
     */
    public function show(subBelanja $subBelanja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subBelanja  $subBelanja
     * @return \Illuminate\Http\Response
     */
    public function edit($id_sub)
    {
        $indukBelanjas = indukBelanja::all();
        $subBelanja = subBelanja::with('indukBelanja')->find($id_sub);
        return view('layouts.sBelanja.edit',compact('indukBelanjas'))->with('subBelanja', $subBelanja);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subBelanja  $subBelanja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sub)
    {
//        dd($request->all());
        $request->validate([
            'sub_belanja' => 'required|min:1',
            'norek_sub' => 'required|min:5',
        ]);
        $subBelanja = subBelanja::find($id_sub);
        $subBelanja->id_induk = $request->id_induk;
        $subBelanja->sub_belanja = $request->sub_belanja;
        $subBelanja->norek_sub = $request->norek_sub;
        $nama = $request->sub_belanja;
        $subBelanja->save();
        return redirect()->route('jBelanja')->with('info','Data ['.$nama.'] Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subBelanja  $subBelanja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sub)
    {
        $subBelanja = subBelanja::find($id_sub);
        $nama = $subBelanja->sub_belanja;
        $subBelanja->delete();
        return redirect()->back()->with('error','Data ['.$nama.'] Dihapus');
    }
}
