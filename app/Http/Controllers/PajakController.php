<?php

namespace App\Http\Controllers;

use App\Pajak;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pajak = Pajak::all();
        return view('layouts.pajak.index',[
            'pajaks' => $pajak,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.pajak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $total = count($request->jenis_pajak);
        for($x = 0; $x < $total; $x++)
        {
            $pajak = new Pajak();
            $pajak->id_belanja = $request->id_belanja;
            $pajak->jenis_pajak = $request->jenis_pajak[$x];
            $pajak->nominal_pajak = $request->nominal_pajak[$x];
            $pajak->id_billing = $request->id_billing[$x];
            $pajak->ntpn = $request->ntpn[$x];
            $pajak->save();
        }

        return redirect()->route('pajak');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function show(Pajak $pajak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pajak)
    {
        $pajak = Pajak::find($id_pajak);
        return view('layouts.pajak.edit')->with('pajak', $pajak);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pajak)
    {
        $request->validate([
            'nominal_pajak' => 'required',
            'id_billing' => 'required',
            'ntpn' => 'required',
        ]);
        $pajak = Pajak::find($id_pajak);
        $pajak->nominal_pajak = $request->nominal_pajak;
        $pajak->id_billing = $request->id_billing;
        $pajak->ntpn = $request->ntpn;

        $pajak->save();
        return redirect()->route('pajak')->with('succes','Data Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pajak)
    {
        $pajak = Pajak::find($id_pajak);
        $pajak->delete();
        return redirect()->back()->with('warning','Data Terhapus');
    }
}
