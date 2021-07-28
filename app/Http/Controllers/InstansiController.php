<?php

namespace App\Http\Controllers;

use App\Instansi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instansi = Instansi::all();
        return view('layouts.instansi.index', [
            'instansi' => $instansi,
        ]);

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
            'nama_instansi' => 'required|min:5',
            'alamat' => 'required|min:5',
            'no_telp' => 'required|min:5',
        ]);
        $instansi = new Instansi();
        $instansi->nama_instansi = $request->nama_instansi;
        $instansi->alamat = $request->alamat;
        $instansi->no_telp = $request->no_telp;
        $nama = $request->nama_instansi;
        $instansi->save();
        return redirect()->route('instansi')->with('success','Data ['.$nama.'] disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function show(Instansi $instansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function edit($id_instansi)
    {
        $instansi = Instansi::find($id_instansi);
        return view('layouts.instansi.edit')->with('instansi', $instansi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_instansi)
    {
        $request->validate([
            'nama_instansi' => 'required|min:5',
            'alamat' => 'required|min:5',
            'no_telp' => 'required|min:5',
        ]);
        $instansi = Instansi::find($id_instansi);
        $nama = $request->nama_instansi;
        $instansi->nama_instansi = $request->nama_instansi;
        $instansi->alamat = $request->alamat;
        $instansi->no_telp = $request->no_telp;

        $instansi->save();
        return redirect()->route('instansi')->with('info','Data ['.$nama.'] diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_instansi)
    {
        $instansi = Instansi::find($id_instansi);
        $nama = $instansi->nama_instansi;
        $instansi->delete();
        return redirect()->back()->with('error','Data ['.$nama.'] dihapus');
    }
}
