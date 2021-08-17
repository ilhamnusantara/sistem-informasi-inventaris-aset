<?php

namespace App\Http\Controllers;
use App\Akun;
use App\User;
use Illuminate\Http\Request;
use Auth, Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akuns = Akun::all();
        $user = User::all();
        return view('layouts.akun.index',[
            'users' => $user,
        ], compact('akuns'));
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
          ]);
//          Akun::create($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        $user->nama_instansi = $request->nama_instansi;
        $user->save();
        return redirect()->route('user')->with('success','Data berhasil di input');
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
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('layouts.akun.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->status = $request->status;
        $user->email = $request->email;
        $user->nama_instansi = $request->nama_instansi;
        $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
//        if (!Hash::check($request->password, $request->password_confirmation)) {
//            return back()->with('error', 'Current password does not match!');
//        }
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user')->with('success', 'Akun berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        $user = User::find($id_user);
        $user->delete();
        return redirect()->route('user')->with('success', 'Akun berhasil di hapus');
    }

    public function change($id)
    {
        $user = User::find($id);
        return view('layouts.akun.change')->with('user', $user);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:3|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password successfully changed!');
    }
    public function false()
    {
        return view('layouts.partials.false');
    }
}
