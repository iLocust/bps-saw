<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahPegawai extends Controller
{
    public function create()
    {
        return view('add-user');
    }

}
