<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Subkriterias;
use App\Models\Penilaian;
use App\Models\Kriterias;
use App\Models\User;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $subkriteria = Subkriterias::get();
        $scores = Penilaian::select(
            'penilaian.id as id',
            'users.id as ida',
            'kriteria.id as idw',
            'subkriteria.id as idr',
            'users.name as name',
            'kriteria.namaKriteria as criteria',
            'subkriteria.nilai as rating',
            'subkriteria.keterangan as description')
        ->leftJoin('users', 'users.id', '=', 'penilaian.user_id')
        ->leftJoin('kriteria', 'kriteria.id', '=', 'penilaian.kriteria_id')
        ->leftJoin('subkriteria', 'subkriteria.id', '=', 'penilaian.subkriteria_id')
        ->get();

        $user = User::get();
        $kriteria = Kriterias::get();
        return view('penilaian', compact('subkriteria','scores', 'user', 'kriteria'))->with('i', 0);
    }

    public function create()
    {
        $user = User::get();
        $kriteria = Kriterias::get();
        $subkriteria = Subkriterias::get();
        return $kriteria;
        // return view('penilaian.create', compact('user','kriteria', 'subkriteria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'criteria' => 'required|array'
        ]);

        // Save the alternative

        // Save the score
        foreach ($request->get('criteria') as $idKriteria => $subkriteria) {
            $score = new Penilaian();
            $score->user_id = $request->user_id;
            $score->kriteria_id = $idKriteria;
            $score->subkriteria_id = $subkriteria;
            $score->save();
        }

        return redirect()->route('penilaian')
            ->with('success', 'Alternative created successfully.');
    }
}
