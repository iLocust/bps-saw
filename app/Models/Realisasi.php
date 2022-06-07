<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    use HasFactory;

    protected $table = 'realisasi';

    protected $fillable = [
        'penugasan_id', 'user_id', 'tgl_selesai'
    ];

    protected $dates = [
        'tgl_selesai'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function penugasan()
    {
        return $this->belongsTo(PenugasanPekerja::class, 'penugasan_id');
    }
}
