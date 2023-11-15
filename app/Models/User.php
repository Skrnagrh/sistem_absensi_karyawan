<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Jabatan;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'induk',
        'jabatan_id',
        'posisi_id',
        'password',
    ];
    // protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }

    public static function kode()
    {
    	$kode = DB::table('users')->max('induk');
    	$addNol = '';
    	$kode = str_replace("000", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "0000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "000";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "00";
    	}elseif (strlen($kode == 4)) {
    		$addNol = "0";
    	}

    	$kodeBaru = $addNol.$incrementKode;
    	return $kodeBaru;
    }
}
