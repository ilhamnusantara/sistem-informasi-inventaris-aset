<?php

namespace App\Http\Controllers;

use App\Rekanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RekananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Rekanan::query();
        if($request->ajax()){
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($row) {
                    $btn = '<a class="btn btn-info btn-sm" href="'.route('rekanan.edit', $row->id_rekanan).'"><i class="fas fa-pencil-alt"></i>Edit</a>';
//                        '<a class="btn btn-danger btn-sm" href="'.route('rekanan.delete', $row).'" onclick="return confirm(Data akan dihapus, lanjutkan?)"><i class="fas fa-trash"></i>Delete</a>';
                    return $btn;

                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('layouts.rekanan.index',[
            'rekanans' => $data,
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
            'nama_rekanan' => 'required|min:5',
            'alamat' => 'required|min:5',
            'nama_pimpinan' => 'required|min:5',
            'no_rek' => 'required|min:6',
            'no_telp' => 'required|min:5',
        ]);
        $rekanan = new Rekanan();
        $rekanan->nama_rekanan = $request->nama_rekanan;
        $rekanan->alamat = $request->alamat;
        $rekanan->nama_pimpinan = $request->nama_pimpinan;
        $rekanan->no_rek = $request->no_rek;
        $rekanan->no_telp = $request->no_telp;
        $rekanan->no_npwp = $request->no_npwp;
        $rekanan->no_siup = $request->no_siup;
        $rekanan->email = $request->email;
        $nama = $request->nama_rekanan;

        $rekanan->save();
        return redirect()->route('rekanan')->with('success','Data ['.$nama.'] disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rekanan  $rekanan
     * @return \Illuminate\Http\Response
     */
    public function show(Rekanan $rekanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rekanan  $rekanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id_rekanan)
    {
        $rekanan = Rekanan::find($id_rekanan);
        return view('layouts.rekanan.edit')->with('rekanan', $rekanan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rekanan  $rekanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_rekanan)
    {
        $request->validate([
            'nama_rekanan' => 'required|min:5',
            'alamat' => 'required|min:5',
            'nama_pimpinan' => 'required|min:5',
            'no_rek' => 'required|min:6',
            'no_npwp' => 'required|min:5',
        ]);
        $rekanan = Rekanan::find($id_rekanan);
        $nama = $request->nama_rekanan;
        $rekanan->nama_rekanan = $request->nama_rekanan;
        $rekanan->alamat = $request->alamat;
        $rekanan->nama_pimpinan = $request->nama_pimpinan;
        $rekanan->no_telp = $request->no_telp;
        $rekanan->no_telp = $request->no_telp;
        $rekanan->no_npwp = $request->no_npwp;
        $rekanan->no_siup = $request->no_siup;
        $rekanan->email = $request->email;

        $rekanan->save();
        return redirect()->route('rekanan')->with('info','Data ['.$nama.'] diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rekanan  $rekanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rekanan)
    {
        $rekanan = Rekanan::find($id_rekanan);
        $nama = $rekanan->nama_rekanan;
        $rekanan->delete();
        return redirect()->back()->with('error','Data ['.$nama.'] dihapus');
    }
}
