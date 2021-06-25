<?php

namespace App\Http\Controllers;

use App\Belanja;
use App\Dokumen;
use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $belanja = Belanja::all();
        $dokumens = Dokumen::all();

        if($search = $request->get('search')){
            $belanja = Belanja::where('no_pbb_ls','LIKE', "%{$search}%")->get();
        }

        return view('layouts.belanja.index',[
            'belanjas' => $belanja,
        ], compact('dokumens'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Belanja  $belanja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Belanja $belanja)
    {
        //
    }
}
