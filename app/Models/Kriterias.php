<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriterias extends Model
{
    use HasFactory;
    protected $table = 'kriteria';

    protected $fillable = [
        'id',
        'namaKriteria',
        'type',
        'bobot',
    ];
}
