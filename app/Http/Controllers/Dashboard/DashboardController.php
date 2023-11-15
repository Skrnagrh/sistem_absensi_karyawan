<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Posisi;
use App\Models\Absensi;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $karyawan = Karyawan::where('user_id', Auth::id())->first();

        $latestAbsensi = Absensi::where('karyawan_id', Auth::id())
            ->whereDate('tanggal', \Carbon\Carbon::today())
            ->latest()
            ->first();

        $userKaryawan = Karyawan::where('user_id', auth()->user()->id)->get();

        return view('dashboard.index', [
            'jabatan' => Jabatan::get()->count(),
            'posisi' => Posisi::get()->count(),
            'karyawan' => Karyawan::get()->count(),
            'datapengguna' => User::get()->count(),
            'karyawans' => $karyawan,
            'latestAbsensi' => $latestAbsensi,
            'showButton' => $userKaryawan,
        ])->with('success', 'Selamat Anda Berhasil Login!');
    }
}
