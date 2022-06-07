<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use App\Models\PenugasanPekerja;
use App\Models\SuratTugas;
use App\Models\User;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function penugasan(Request $request)
    {
        $pekerjaan = Pekerjaan::all();

        $suratTugas = [];
        if ($request->has('pekerjaan')) {
            $suratTugas = SuratTugas::where('pekerjaan_id', $request->pekerjaan)->get();
        }

        return view('admin.pekerjaan.penugasan', [
            'pekerjaan' => $pekerjaan,
            'surat_tugas' => $suratTugas,
            'pekerja' => User::where('role', User::ROLE_PEKERJA)->pluck('name', 'id')
        ]);
    }

    public function storePenugasan(Request $request)
    {
        $request->validate([
            'pekerjaan' => 'required|numeric|exists:pekerjaan,id',
            'surat' => 'required|numeric|exists:surat_tugas,id',
            'pekerja' => 'required|array'
        ]);

        foreach ($request->pekerja as $pekerja) {
            PenugasanPekerja::create([
                'surat_tugas_id' => $request->surat,
                'user_id' => $pekerja
            ]);
        }

        return redirect()->back()->with('success', 'Penugasan berhasil ditambah');
    }
}
