<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Kriterias;
use App\Models\Subkriterias;
use Illuminate\Http\Request;

class SubkriteriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function index()
    // {
    //     $data = DB::table('kriteria')->get();
    //     $list = DB::table('subkriteria')->get();
    //     return view('list-subkriteria', compact('data','list'));
    // }
    public function index()
    {
        $list = Kriterias::get();
        $data = Subkriterias::leftJoin('kriteria', 'subkriteria.kriteria_id', '=', 'kriteria.id')
            ->select(
                'subkriteria.id as id',
                'subkriteria.kriteria_id as cid',
                'subkriteria.nilai as nilai',
                'subkriteria.keterangan as keterangan',
                'kriteria.id as kid',
                'kriteria.namaKriteria as namaKriteria'
            )
            ->paginate(10);

        return view('list-subkriteria', compact('data', 'list'))->with('i', 0);
    }

    public function delete($subkriteria)
    {
        Subkriterias::findOrFail($subkriteria)->delete();
        return redirect()->back()->with('success', 'Surat berhasil ditambahkan');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nilai' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        Subkriterias::create([
            'kriteria_id' => $request->kriteria_id,
            'nilai' => $request->nilai,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Surat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subkriterias  $subkriterias
     * @return \Illuminate\Http\Response
     */
    public function show(subkriterias $subkriterias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subkriterias  $subkriterias
     * @return \Illuminate\Http\Response
     */
    public function edit(subkriterias $subkriterias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subkriterias  $subkriterias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subkriterias $subkriterias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subkriterias  $subkriterias
     * @return \Illuminate\Http\Response
     */
    public function destroy(subkriterias $subkriterias)
    {
        //
    }
}
