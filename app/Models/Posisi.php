<?php

namespace App\Models;

use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posisi extends Model
{
    use HasFactory;

    protected $table = 'posisis';

    protected $fillable = [
        'nama',
        'jabatan_id',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'jabatan');
    }
    public function karyawans()
    {
        return $this->hasMany(Karyawan::class, 'name');
    }
}
