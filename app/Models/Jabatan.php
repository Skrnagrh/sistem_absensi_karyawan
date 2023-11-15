<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function jabatan()
    {
        return $this->hasMany(Jabatan::class);
    }
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
    public function getRouteKeyName()
    {
        return 'id';
    }
}
