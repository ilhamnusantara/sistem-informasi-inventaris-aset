<?php

namespace App\Http\Controllers;
use App\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = Akun::all();
        return view('layouts.akun.index',[
            'akuns' => $akun,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.akun.create');
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
            'id_akun' => 'required',
            'nama_user' => 'required',
            'instansi' => 'required',
            'username' => 'required',
            'password' => 'required',
          ]);
          Akun::create($request->all());
          return redirect()->route('akun.index')->with('success','Data berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Akun $akun)
    {
        return view('layouts.akun.edit', compact('akun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Akun $akun)
    {
        $request->validate([
            'id_akun' => 'required',
            'nama_user' => 'required',
            'instansi' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        $akun->update($request->all());
        return redirect()->route('akun.index')->with('success', 'Akun berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Akun $akun)
    {
        $akun->delete();
        return redirect()->route('akun.index')->with('success', 'Akun berhasil di hapus');
    }
}
