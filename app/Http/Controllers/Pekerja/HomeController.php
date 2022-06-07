<?php

namespace App\Http\Controllers\Pekerja;

use App\Http\Controllers\Controller;
use App\Models\PenugasanPekerja;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Realisasi;

class HomeController extends Controller
{
    public function home()
    {
        return view('pekerja.home', [
            'penugasan' => PenugasanPekerja::with('suratTugas', 'suratTugas.pekerjaan', 'realisasi')->where('user_id', auth()->id())->get()
        ]);
    }

    public function pekerjaan()
    {
        $data = User::all();
        return view('/pekerjaan', ['data' => $data]);
    }

    public function selesai($penugasan_id)
    {
        $tugas = PenugasanPekerja::findOrFail($penugasan_id);
        if (Realisasi::where('penugasan_id', $tugas->id)->where('user_id', auth()->id())->exists()) {
            return redirect()->back()->withErrors('Gagal. Tugas ini sudah diselesaikan');
        }

        Realisasi::create([
            'user_id' => auth()->id(),
            'penugasan_id' => $tugas->id,
            'tgl_selesai' => now()
        ]);
        return redirect()->back()->with('success', 'Tugas berhasil diselesaikan');
    }
}
