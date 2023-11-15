<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Posisi;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PosisiController extends Controller
{
    public function index()
    {
        $userKaryawan = Karyawan::where('user_id', auth()->user()->id)->get();
        return view('dashboard.posisi.index', [
            'posisis' => Posisi::all(),
            'jabatans' => Jabatan::all(),
            'karyawan' => Karyawan::all(),
            'showButton' => $userKaryawan,
        ]);
    }


    public function create()
    {
    }

    public function store(Request $request)
    {
        // buat ngeposting data
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'jabatan_id' => 'required|max:255',
        ]);
        Posisi::create($validatedData);
        // untuk menampilkan alert atau kata sukses
        return redirect('/posisi')->with('success', 'Data Posisi Berhasil di Tambahkan!');
    }

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

        return view('dashboard.posisi.show', compact('posisis', 'jabatan', 'karyawan'));
    }

    public function edit(Posisi $posisi)
    {
        return view('posisi.edit', compact('posisi'));
    }

    public function update(Request $request, Posisi $posisi)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'jabatan_id' => 'required|max:255',
        ]);

        // Update data posisi dengan data yang telah divalidasi
        $posisi->update($validatedData);

        // Redirect ke halaman yang sesuai dan tampilkan pesan sukses
        return redirect('/posisi')->with('success', 'Data Posisi Berhasil diperbarui!');
    }


    public function destroy(Posisi $posisi)
    {
        // Hapus data posisi
        $posisi->delete();

        // Redirect ke halaman yang sesuai dan tampilkan pesan sukses
        return redirect('/posisi')->with('success', 'Data Posisi Berhasil dihapus!');
    }


    public function detail($jabatan_id)
    {
        $posisis = Posisi::where('jabatan_id', $jabatan_id)->get();
        return view('dashboard.posisi.index', compact('posisis'));
    }
}
