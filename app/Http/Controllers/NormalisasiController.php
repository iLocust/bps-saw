<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Subkriterias;
use App\Models\Penilaian;
use App\Models\Kriterias;
use App\Models\User;
use Illuminate\Http\Request;

class NormalisasiController extends Controller
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
            $sample = Penilaian::where('user_id', '=', $a->id)->first();
            if ($sample !=  null) {
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
                $afilter[$icw]->nilai = round($result, 2);                     
            }
        }
    }
       
        return view('normalisasi', compact('scores', 'user','kriteria'))->with('i', 0);


        // foreach ($user as $u) {
        //     $userScores = $scores->where('ida', $u->id)->values()->all();
        //     foreach ($userScores as $i => $score) {
        //         $nilai = $scores2->map(function ($s) use ($score) {
        //                 if ($score->id == $s->idk) {
        //                     return intval($s->nilai);
        //                 }
        //             })
        //             ->toArray();
        //         $nilai = array_values(array_filter($nilai));

                
        //         if ($score->sifat == 'Benefit') {              
        //             $finalScore = $userScores[$i]->nilai / max($nilai);
        //             $msg = 'rate ' . $userScores[$i]->nilai . ' max ' . max($nilai) . ' res ' . $finalScore;
        //         } else {
        //             $finalScore = min($nilai) / $userScores[$i]->nilai;
        //         }

        //         $userScores[$i]->nilai = round($finalScore, 2);
        //     }

        // }

        // return view('normalisasi', compact('subkriteria','scores', 'user', 'kriteria'))->with('i', 0);
    }
}
