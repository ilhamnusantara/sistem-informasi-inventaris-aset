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
        $record = Dokumen::find($request->id_dokumen);
        $record->status_belanja = 1;
        $record->save();
        $request->validate([
            'satuan' => 'required|min:1',
            'volume' => 'required|min:1',
            'nominal_belanja' => 'required|min:1',
            'rekanan' => 'required|min:1',
            'no_pbb_ls' => 'required|min:1',
            'tanggal_belanja' => 'required|min:1',
        ]);
        $Belanja = new Belanja();
        $Belanja->id_dokumen = $request->id_dokumen;
        $Belanja->satuan = $request->satuan;
        $Belanja->volume = $request->volume;
        $Belanja->nominal_belanja = $request->nominal_belanja;
        $Belanja->rekanan = $request->rekanan;
        $Belanja->no_pbb_ls = $request->no_pbb_ls;
        $Belanja->tanggal_belanja = $request->tanggal_belanja;
        $Belanja->sp2d = $request->sp2d;
        $Belanja->tanggal_sp2d = $request->tanggal_sp2d;
        $Belanja->save();
//        return redirect()->route('belanja')->with('succes','Data Disimpan');
        return redirect()->route('belanja.show', $Belanja->id_belanja);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Belanja  $belanja
     * @return \Illuminate\Http\Response
     */
    public function show($id_belanja)
    {
        $dokumens = Dokumen::all();
        $belanja = Belanja::with('Dokumen')->find($id_belanja);
        return view('layouts.belanja.show',compact('dokumens'))->with('belanja', $belanja);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Belanja  $belanja
     * @return \Illuminate\Http\Response
     */
    public function edit($id_belanja)
    {
        $dokumens = Dokumen::all();
        $belanja = Belanja::with('Dokumen')->find($id_belanja);
        return view('layouts.belanja.edit',compact('dokumens'))->with('belanja', $belanja);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Belanja  $belanja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_belanja)
    {
        $request->validate([
            'satuan' => 'required|min:1',
            'volume' => 'required|min:1',
            'nominal_belanja' => 'required|min:1',
            'rekanan' => 'required|min:1',
            'no_pbb_ls' => 'required|min:1',
            'tanggal_belanja' => 'required|min:1',
        ]);
        $Belanja = Belanja::find($id_belanja);
        if ($Belanja->id_dokumen != $request->id_dokumen){
            $rubah = Dokumen::find($Belanja->id_dokumen);
            $rubah->status = 1;
            $rubah->status_belanja = 0;
            $rubah->save();
            $rubah2 = Dokumen::find($request->id_dokumen);
            $rubah2->status_belanja = 1;
            $rubah2->save();
            $Belanja->id_dokumen = $request->id_dokumen;
        }elseif ($Belanja->id_dokumen == $request->id_dokumen){
            $Belanja->id_dokumen = $request->id_dokumen;
        }
        $Belanja->satuan = $request->satuan;
        $Belanja->volume = $request->volume;
        $Belanja->nominal_belanja = $request->nominal_belanja;
        $Belanja->rekanan = $request->rekanan;
        $Belanja->no_pbb_ls = $request->no_pbb_ls;
        $Belanja->tanggal_belanja = $request->tanggal_belanja;
        $Belanja->sp2d = $request->sp2d;
        $Belanja->tanggal_sp2d = $request->tanggal_sp2d;
        $Belanja->save();
        return redirect()->route('belanja.show',$Belanja->id_belanja)->with('success','Data Telah Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Belanja  $belanja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_belanja)
    {
        $belanja = Belanja::find($id_belanja);
        $hStatus = Dokumen::find($belanja->id_dokumen);
        $hStatus->status = 1;
        $hStatus->status_belanja = 0;
        $hStatus->save();
        $belanja->delete();
        return redirect()->route('belanja')->with('warning','Data Terhapus');
    }

    public function unvervalbelanja($id_dokumen)
    {
        $batal = Dokumen::find($id_dokumen);
        $batal->status = 0;
        $batal->save();
        return redirect()->back()->with('danger','Batal validasi');
    }
    public function vervalbelanja($id_dokumen)
    {
        $verif = Dokumen::find($id_dokumen);
        $verif->status = 1;
        $verif->save();
        return redirect()->route('belanja')->with('success','Tervalidasi');
    }

}
