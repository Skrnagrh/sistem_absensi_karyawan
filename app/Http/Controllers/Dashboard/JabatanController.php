<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Posisi;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userKaryawan = Karyawan::where('user_id', auth()->user()->id)->get();
        return view('dashboard.jabatan.index', [
            'title' => 'Jabatan Karyawan',
            'jabatan' => Jabatan::all(),
            'showButton' => $userKaryawan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.eror');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // buat ngeposting data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        Jabatan::create($validatedData);
        // untuk menampilkan alert atau kata sukses
        return redirect('/jabatan')->with('success', 'Data Jabatan Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show($jabatan_id)
    {
        // Temukan jabatan berdasarkan jabatan_id
        $jabatan = Jabatan::find($jabatan_id);

        // Jika jabatan tidak ditemukan, Anda dapat menangani kesalahan di sini
        if (!$jabatan) {
            return redirect()->route('jabatan.index')->with('error', 'Jabatan tidak ditemukan');
        }

        // Ambil daftar posisi yang terkait dengan jabatan
        $posisis = Posisi::where('jabatan_id', $jabatan_id)->get();

        // Pastikan $jabatan tidak null sebelum menjalankan query
        if ($jabatan) {
            // Ambil daftar karyawan yang memiliki jabatan yang sesuai dan posisi yang sesuai
            $karyawan = Karyawan::where('jabatan', $jabatan->name)
                ->whereIn('posisi', $posisis->pluck('nama'))
                ->get();
        } else {
            $karyawan = []; // Inisialisasi dengan array kosong jika jabatan tidak ditemukan
        }

        return view('dashboard.jabatan.show', compact('posisis', 'jabatan', 'karyawan'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        return view('dashboard.jabatan.edit', [
            'title' => 'Jabatan Karyawan',
            'jabatan' => $jabatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);

        Jabatan::where('id', $jabatan->id)
            ->update($validatedData);
        return redirect('/jabatan')->with('success', 'Data Jabatan Berhasil di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        Jabatan::destroy($jabatan->id);
        return redirect('/jabatan')->with('success', 'Data Jabatan Berhasil di Hapus!');
    }
}
