<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\SuratTugas;
use Illuminate\Http\Request;

class SuratTugasController extends Controller
{
    public function create()
    {
        return view('surat-tugas', [
            'pekerjaan' => Pekerjaan::pluck('nama', 'id')
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'pekerjaan_id' => 'required|exists:pekerjaan,id',
            'tgl_mulai' => 'required|date|date_format:Y-m-d',
            'tgl_selesai' => 'required|after:tgl_mulai|date|date_format:Y-m-d'
        ]);

        SuratTugas::create([
            'nomor' => $request->nomor_surat,
            'pekerjaan_id' => $request->pekerjaan_id,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai
        ]);

        return redirect()->back()->with('success', 'Surat berhasil ditambahkan');
    }
}
