<?php

namespace App\Http\Controllers;

use App\Belanja;
use App\Dokumen;
use App\Rekanan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dokumens = Dokumen::all();
        $rekanans = Rekanan::all();
        $data = Belanja::query();

        if($request->min && $request->max ){
            $date_start = \Carbon\Carbon::parse(urldecode($request->min))->format('Y-m-d');
            $date_end = \Carbon\Carbon::parse(urldecode($request->max))->format('Y-m-d');
            $data->whereRaw('DATE(tanggal_belanja) BETWEEN DATE(?) AND DATE(?)', [$date_start, $date_end]);

        }

        if($request->ajax()){
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('dokumen', function($row) {
                    $dokumen = $row->Dokumen->keterangan_belanja;
                    return $dokumen;
                })
                ->addColumn('rekanan', function($row) {
                    $rekanan = $row->rekanan->nama_rekanan;
                    return $rekanan;
                })
                ->addColumn('aksi', function($row) {
                    if ($row->Dokumen->status == 1 && $row->Dokumen->status_belanja == 1){
                        $btn = '<a class="btn btn-success btn-sm" href="'.route('belanja.show', $row->id_belanja).'"><i class="fas fa-search"></i></a>';
                        return $btn;
                    }elseif ($row->Dokumen->status == 0 && $row->Dokumen->status_belanja == 1){
                        $btn = '<a class="btn btn-danger btn-sm" href="'.route('belanja.show', $row->id_belanja).'"><i class="fas fa-search"></i></a>';
                        return $btn;
                    }

                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('layouts.belanja.index',[
            'belanjas' => $data,
        ], compact('dokumens','rekanans'));
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
            'satuan' => 'required|min:1',
            'volume' => 'required|min:1',
            'nominal_belanja' => 'required|min:1',
            'no_pbb_ls' => 'required|min:1',
            'tanggal_belanja' => 'required|min:1',
        ]);
        if ($request->tanggal_belanja != null && $request->tanggal_sp2d != null ){
            $date_belanja = \Carbon\Carbon::parse(urldecode($request->tanggal_belanja))->format('Y-m-d');
            $date_sp2d = \Carbon\Carbon::parse(urldecode($request->tanggal_sp2d))->format('Y-m-d');

        }elseif ($request->tanggal_belanja == null || $request->tanggal_sp2d == null){
            if ($request->tanggal_belanja == null){
                $date_belanja = null;
                $date_sp2d = \Carbon\Carbon::parse(urldecode($request->tanggal_sp2d))->format('Y-m-d');
            }elseif ($request->tanggal_sp2d == null){
                $date_belanja = \Carbon\Carbon::parse(urldecode($request->tanggal_belanja))->format('Y-m-d');
                $date_sp2d = null;
            }
        }
        else{
            $date_belanja = null;
            $date_sp2d = null;
        }
        $Belanja = new Belanja();
        $Belanja->id_dokumen = $request->id_dokumen;
        $Belanja->satuan = $request->satuan;
        $Belanja->volume = $request->volume;
        $Belanja->nominal_belanja = $request->nominal_belanja;
        $Belanja->id_rekanan = $request->id_rekanan;
        $Belanja->no_pbb_ls = $request->no_pbb_ls;
        $Belanja->tanggal_belanja = $date_belanja;
        $Belanja->sp2d = $request->sp2d;
        $Belanja->tanggal_sp2d = $date_sp2d;
        $Belanja->save();
        $record = Dokumen::find($request->id_dokumen);
        $record->status_belanja = 1;
        $record->save();
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
        $rekanans = Rekanan::all();
        $belanja = Belanja::with('Dokumen')->find($id_belanja);
        return view('layouts.belanja.show',compact('dokumens','rekanans'))->with('belanja', $belanja);
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
        $rekanans = Rekanan::all();
        $belanja = Belanja::with('Dokumen')->find($id_belanja);
        return view('layouts.belanja.edit',compact('dokumens','rekanans'))->with('belanja', $belanja);
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
        $date_belanja = \Carbon\Carbon::parse(urldecode($request->tanggal_belanja))->format('Y-m-d');
        $date_sp2d = \Carbon\Carbon::parse(urldecode($request->tanggal_sp2d))->format('Y-m-d');
        $Belanja->satuan = $request->satuan;
        $Belanja->volume = $request->volume;
        $Belanja->nominal_belanja = $request->nominal_belanja;
        $Belanja->id_rekanan = $request->id_rekanan;
        $Belanja->no_pbb_ls = $request->no_pbb_ls;
        $Belanja->tanggal_belanja = $date_belanja;
        $Belanja->sp2d = $request->sp2d;
        $Belanja->tanggal_sp2d = $date_sp2d;
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
