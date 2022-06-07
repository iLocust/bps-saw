<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Kriterias;
use App\Models\User;

class RankingController extends Controller
{
    public function index()
    {

        $scores = Penilaian::select(
            'penilaian.id as id',
            'users.id as ida',
            'kriteria.id as idk',
            'subkriteria.id as idr',
            'users.name as name',
            'kriteria.namaKriteria as kriteria',
            'subkriteria.nilai as nilai',
            'subkriteria.keterangan as description'
        )
            ->leftJoin('users', 'users.id', '=', 'penilaian.user_id')
            ->leftJoin('kriteria', 'kriteria.id', '=', 'penilaian.kriteria_id')
            ->leftJoin('subkriteria', 'subkriteria.id', '=', 'penilaian.subkriteria_id')
            ->get();

        $cscores = Penilaian::select(
            'penilaian.id as id',
            'users.id as ida',
            'kriteria.id as idk',
            'subkriteria.id as idr',
            'users.name as name',
            'kriteria.namaKriteria as kriteria',
            'subkriteria.nilai as nilai',
            'subkriteria.keterangan as description'
        )
            ->leftJoin('users', 'users.id', '=', 'penilaian.user_id')
            ->leftJoin('kriteria', 'kriteria.id', '=', 'penilaian.kriteria_id')
            ->leftJoin('subkriteria', 'subkriteria.id', '=', 'penilaian.subkriteria_id')
            ->get();

        $user = User::get();
        $kriteria = Kriterias::get();

        // Normalization
        foreach ($user as $a) {
            // Get all scores for each alternative id
            $afilter = $scores->where('ida', $a->id)->values()->all();
            // Loop each criteria
            foreach ($kriteria as $icw => $cw) {

                // Get all rating value for each criteria
                $rates = $cscores->map(function ($val) use ($cw) {
                    if ($cw->id == $val->idk) {
                        return $val->nilai;
                    }
                })->toArray();
                // array_filter for removing null value caused by map,
                // array_values for reiindex the array           
                $rates = array_values(array_filter($rates));
                if ($cw->type == 'benefit') {
                    $result = $afilter[$icw]->nilai / max($rates);
                    $msg = 'rate ' . $afilter[$icw]->nilai . ' max ' . max($rates) . ' res ' . $result;
                } elseif ($cw->type == 'cost') {
                    $result = min($rates) / $afilter[$icw]->nilai;
                }
                $result *= $cw->bobot;
                $afilter[$icw]->nilai = round($result, 2);
            }
        }


        return view('ranking', compact('scores', 'user', 'kriteria'))->with('i', 0);
    }
};
