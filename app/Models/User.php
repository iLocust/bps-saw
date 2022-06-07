<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 0;
    const ROLE_PENGAWAS = 1;
    const ROLE_PEKERJA = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nim',
        'name',
        'email',
        'password',
        'umur',
        'role',
        'tempat_lahir',
        'tanggal_lahir',
        'domisili_kec',
        'domisili_desa',
        'domisili_rt',
        'domisili_rw',
        'domisili_jalan',
        'kode_post',
        'no_hp'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->attributes['role'] == self::ROLE_ADMIN;
    }

    public function isPengawas()
    {
        return $this->attributes['role'] == self::ROLE_PENGAWAS;
    }

    public function isPekerja()
    {
        return $this->attributes['role'] == self::ROLE_PEKERJA;
    }

    public function penugasan()
    {
        return $this->hasMany(PenugasanPekerja::class, 'user_id')->with(['suratTugas', 'suratTugas.pekerjaan']);
    }

    public function getRoleStringAttribute()
    {
        return [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_PEKERJA => 'Pekerja',
            self::ROLE_PENGAWAS => 'Pengawas'
        ][$this->attributes['role']];
    }
}
