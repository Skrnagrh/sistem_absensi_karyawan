<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Posisi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DatapenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kode = User::kode();
        return view('dashboard.datapengguna.index', [
            'title' => 'Data Pengguna',
            'user1' => User::all(),
            'jabatan' => Jabatan::all(),
            'posisi' => Posisi::all(),
            'kode' => $kode
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
    public function store(Request $request,)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'induk' => 'required|unique:users',
            'jabatan_id' => 'max:255',
            'posisi_id' => 'max:255',
            'password' => 'min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/datapengguna')->with('success', 'Data Pengguna Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     request()->validate([
    //         'induk'       => 'required|string|min:2|max:100',
    //         'name'       => 'required|string|min:2|max:100',
    //         'jabatan_id' => 'required|string|min:2|max:100',
    //         'posisi_id'   => 'required|string|min:2|max:100',
    //     ]);

    //     $user = User::find($id);
    //     $user->induk = $request->induk;
    //     $user->name = $request->name;
    //     $user->jabatan_id = $request->jabatan_id;
    //     $user->posisi_id = $request->posisi_id;

    //     $user->save();
    //     return redirect('/datapengguna')->with('success', 'Profile Anda Berhasil di Perbaharui!');
    // }

    public function penggunaupdate(Request $request, $id)
    {
        request()->validate([
            'induk'       => 'required|string|min:2|max:100',
            'name'       => 'required|string|min:2|max:100',
            'jabatan_id'       => 'max:100',
            'posisi_id'   => 'required|string|min:2|max:100',
        ]);

        $user = User::find($id);
        $user->induk = $request->induk;
        $user->name = $request->name;
        $user->jabatan_id = $request->jabatan;
        $user->posisi_id = $request->posisi_id;

        $user->save();
        return redirect('/datapengguna')->with('success', 'Profile Anda Berhasil di Perbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function destroy(User $user)
    public function destroy($id)
    {
        // User::destroy($user->id);
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/datapengguna')->with('success', 'Data Pengguna Berhasil di hapus!');
    }
}
