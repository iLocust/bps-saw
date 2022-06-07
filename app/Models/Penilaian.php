<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian';

    protected $fillable = [
        'user_id',
        'kriteria_id', 
        'subkriteria_id', 
    ];
    
    public function kriteria()
    {
        return $this->belongsTo(Kriterias::class, 'kriteria_id');
    }

    public function subkriteria()
    {
        return $this->belongsTo(Subkriterias::class, 'subkriteria_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}