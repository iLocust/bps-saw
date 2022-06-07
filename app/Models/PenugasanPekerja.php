<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenugasanPekerja extends Model
{
    use HasFactory;

    public $table = 'penugasan_pekerja';

    protected $fillable = [
        'user_id', 'surat_tugas_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function suratTugas()
    {
        return $this->belongsTo(SuratTugas::class, 'surat_tugas_id');
    }

    public function realisasi()
    {
        return $this->hasOne(Realisasi::class, 'penugasan_id');
    }
}
