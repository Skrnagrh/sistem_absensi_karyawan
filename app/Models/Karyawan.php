<?php

namespace App\Models;

// use App\Models\Jabatan;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'nip',
        'name',
        'jabatan',
        'posisi',
        'idcard',
        'tempat',
        'tgllahir',
        'jenkel',
        'agama',
        'pendidikan',
        'nohp',
        'lulus',
        'status',
        'alamat',
        'image',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }

    public function getRouteKeyName()
    {
        return 'nip';
    }
}
