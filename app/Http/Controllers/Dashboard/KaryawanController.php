<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Posisi;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Karyawan $karyawan)
    {
        $usertypeJabatan = Auth::user()->jabatan_id;
        $usertypePosisi = Auth::user()->posisi_id;

        if ($usertypeJabatan == 'HRGA' && $usertypePosisi == 'Staff') {
            $kode = User::kode();
            return view('dashboard.karyawan.index', [
                'title' => 'Data Karyawan',
                'karyawan1' => Karyawan::all(),
                'jabatans' => Jabatan::all(),
                'posisis' => Posisi::all(),
                'users' => User::all(),
                'nipvalue' => Karyawan::get()->count(),
                'kode' => $kode
            ]);
        } else {
            $userKaryawan = Karyawan::where('user_id', auth()->user()->id)->get();

            return view('dashboard.karyawan.index', [
                'title' => 'Data Karyawan',
                'karyawan1' => $userKaryawan,
                'karyawan' => $karyawan,
                'showTambahButton' => $userKaryawan->isEmpty(),
                'showButton' => $userKaryawan,
            ]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Cek apakah pengguna telah menginput data sebelumnya
        $existingKaryawan = Karyawan::where('nip', $request->nip)
            ->where('user_id', auth()->user()->id)
            ->first();

        // Jika data sudah ada, redirect ke halaman sebelumnya dengan pesan kesalahan
        if ($existingKaryawan) {
            return redirect()->back()->with('warning', 'Maaf, data Anda sudah ada!');
        }

        // Validasi data input
        $validatedData = $request->validate([
            'nip' => 'required|unique:karyawans',
            'name' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'posisi' => 'required|max:255',
            'idcard' => 'required|max:255',
            'tempat' => 'required|max:255',
            'tgllahir' => 'required|max:255',
            'jenkel' => 'required|max:255',
            'agama' => 'required|max:255',
            'pendidikan' => 'required|max:255',
            'nohp' => 'required|max:255',
            'lulus' => 'required|max:255',
            'status' => 'required|max:255',
            'alamat' => 'required|max:255',
            'image' => 'required|image',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('karyawan-images');
        }


        $validatedData['user_id'] = auth()->user()->id;

        // Buat dan simpan data karyawan
        $result = Karyawan::create($validatedData);

        // Cek apakah penyimpanan berhasil
        if ($result) {
            // Redirect dengan pesan sukses
            return redirect('/karyawan')->with('success', 'Data Karyawan Berhasil di Tambahkan!');
        } else {
            // Redirect dengan pesan kesalahan
            return back()->with('warning', 'Data Karyawan Gagal di Tambahkan!');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('dashboard.karyawan.print', [
            'title' => 'Data Karyawan',
            'karyawan' => $karyawan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('dashboard.karyawan.edit', [
            'title' => 'Data Karyawan',
            'karyawan' => $karyawan,
            'jabatans' => Jabatan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Karyawan $karyawan)
    {
        $rules = [
            'nip' => 'required',
            'name' => 'required|max:255',
            'jabatan' => 'max:255',
            'posisi' => 'max:255',
            'idcard' => 'required|max:255',
            'tempat' => 'max:255',
            'tgllahir' => 'max:255',
            'jenkel' => 'max:255',
            'agama' => 'max:255',
            'pendidikan' => 'max:255',
            'nohp' => 'max:255',
            'lulus' => 'max:255',
            'status' => 'max:255',
            'alamat' => 'required|max:255',
            'image' => 'image',
        ];

        if ($request->hasFile('image')) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:1024';
        }

        $validatedData = $request->validate($rules);

        // Update nip
        if ($request->nip != $karyawan->nip) {
            $validatedData['nip'] = 'required|unique:karyawans';
        }

        // Update gambar
        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('karyawan-images');
        }

        Karyawan::where('id', $karyawan->id)
            ->update($validatedData);

        return redirect('/karyawan')->with('success', 'Data Karyawan Berhasil di Ubah!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */

    public function destroy(Karyawan $karyawan)
    {
        try {
            // Nonaktifkan sementara pengecekan foreign key
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            // Hapus karyawan
            $karyawan->delete();

            // Hapus data terkait dari tabel absensi
            // Gantilah 'karyawan_id' dan 'absensi' dengan nama yang sesuai di database Anda
            DB::table('absensi')->where('karyawan_id', $karyawan->id)->delete();

            // Aktifkan kembali pengecekan foreign key
            DB::statement('SET FOREIGN_KEY_CHECKS=1');

            return redirect('/karyawan')->with('success', 'Data Karyawan Berhasil di Hapus!');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect('/karyawan')->with('error', 'Gagal menghapus data karyawan.');
        }
    }
}
