<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkriterias extends Model
{
    use HasFactory;
    protected $table = 'subkriteria';

    protected $fillable = [
        'kriteria_id', 'nilai', 'keterangan'
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriterias::class, 'kriteria_id');
    }

}
