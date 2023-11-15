<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Posisi;
use App\Models\Absensi;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AbsensiExport;


class AbsensiController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();

        $usertypeJabatan = Auth::user()->jabatan_id;
        $usertypePosisi = Auth::user()->posisi_id;


        // Inisialisasi query builder untuk tabel Absensi
        $absensiQuery = Absensi::query()->latest();

        // Ambil tanggal mulai dan tanggal akhir dari form (jika ada)
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $userKaryawan = Karyawan::where('user_id', auth()->user()->id)->get();

        if ($usertypeJabatan == 'HRGA' && $usertypePosisi == 'Staff') {
            // Jika pengguna adalah Staff, ambil data berdasarkan tanggal yang dipilih
            if ($startDate && $endDate) {
                $absensiQuery->whereBetween('tanggal', [$startDate, $endDate]);
            } elseif ($startDate) {
                $absensiQuery->whereDate('tanggal', $startDate);
            }

            // Filter berdasarkan nama karyawan
            $namaKaryawan = $request->input('karyawan_id');
            if ($namaKaryawan) {
                $absensiQuery->where('karyawan_id', $namaKaryawan);
            }

            // Filter berdasarkan jabatan
            $jabatan = $request->input('jabatan');
            if ($jabatan) {
                $absensiQuery->where('id', $jabatan);
            }

            // Filter berdasarkan posisi
            $posisi = $request->input('posisi');
            if ($posisi) {
                $absensiQuery->where('id', $posisi);
            }
        } else {
            // Jika pengguna bukan Staff, ambil data sesuai dengan user_id
            $absensiQuery->where('karyawan_id', $user->id);

            if ($startDate && $endDate) {
                $absensiQuery->whereBetween('tanggal', [$startDate, $endDate]);
            } elseif ($startDate) {
                $absensiQuery->whereDate('tanggal', $startDate);
            }
        }

        $absensi = $absensiQuery->get();

        // Load data karyawan, jabatan, dan posisi untuk filter
        $namaKaryawan = Karyawan::all();
        $jabatan = Jabatan::all();
        $posisi = Posisi::all();


        // Mendapatkan waktu saat ini dalam zona waktu Indonesia Barat (WIB)
        $waktuIndonesia = Carbon::now('Asia/Jakarta')->format('Y-m-d\TH:i');

        return view('dashboard.absensi.index', compact('absensi', 'namaKaryawan', 'jabatan', 'posisi'), [
            'showButton' => $userKaryawan,
            'waktuIndonesia' => $waktuIndonesia,
        ]);
    }



    public function create()
    {
    }


    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
            'latitude' => '',
            'longitude' => '',
        ]);

        if (!Karyawan::find($request->input('karyawan_id'))) {
            return redirect()->route('karyawan.index')->with('error', 'Data Karyawan Tidak Ditemukan. Tambahkan Data Karyawan Terlebih Dahulu.');
        }


        $absensiData = [
            'karyawan_id' => $request->input('karyawan_id'),
            'tanggal' => $request->input('tanggal'),
            'status' => $request->input('status'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'image' => $request->input('image'),
        ];

        Absensi::create($absensiData);

        return redirect()->route('absensi.index')->with('success', 'Terimakasih, absen anda telah tersimpan.');
    }




    public function show(Absensi $absensi)
    {
    }

    public function edit(Absensi $absensi)
    {
    }


    public function destroy(Absensi $absensi)
    {
        // Hapus data absensi
        // $absensi->delete();

        // return redirect()->route('dashboard.absensi.index')
        //     ->with('success', 'Data absensi berhasil dihapus.');
    }



    public function showFilterForm()
    {
        $tanggalUnik = DB::table('absensi')->select(DB::raw('DATE(tanggal) as tanggal'))->distinct()->get();

        return view('absensi.index', compact('tanggalUnik'));
    }
}
