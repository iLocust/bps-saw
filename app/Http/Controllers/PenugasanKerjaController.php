<?php

namespace App\Http\Controllers;

use App\Models\PenugasanPekerja;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PenugasanKerjaController extends Controller
{
    function index()
    {
        $data = DB::table('penugasan_pekerja')
            ->select(['users.name', 'surat_tugas.nomor', 'pekerjaan.nama', 'penugasan_pekerja.id'])
            ->join('users', 'users.id', '=', 'penugasan_pekerja.user_id')
            ->join('surat_tugas', 'surat_tugas.id', '=', 'penugasan_pekerja.surat_tugas_id')
            ->join('pekerjaan', 'pekerjaan.id', '=', 'surat_tugas.pekerjaan_id')
            ->paginate(10);

            // Eloquent
        // $data = PenugasanPekerja::with('suratTugas', 'suratTugas.pekerjaan')->get();
        return view('list-job', ['data' => $data]);
    }

    public function delete($job)
    {
        PenugasanPekerja::findOrFail($job)->delete();

        return redirect()->back()->with('success', 'Penugasan berhasil dihapus');
    }
}
