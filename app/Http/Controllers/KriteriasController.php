<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Kriterias;
use Illuminate\Http\Request;

class KriteriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kriteria')->get();
        return view('list-kriteria', ['data' => $data]);
    }

    public function delete($kriteria)
    {
        Kriterias::findOrFail($kriteria)->delete();

        return redirect()->back()->with('success', 'Penugasan berhasil dihapus');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('list-kriteria', [
            'user' => auth()->user()
        ]);
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
            'namaKriteria' => 'required|string',
            'type' => 'required',
            'bobot' => 'required',
        ]);

        Kriterias::create($request->all());
        // Kriterias::create([
        //     'namaKriteria' => $request->namaKriteria,
        //     'type' => $request->type,
        //     'bobot' => $request->bobot,
        // ]);

        return redirect()->back()->with('success', 'Surat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kriterias  $kriterias
     * @return \Illuminate\Http\Response
     */
    public function show(kriterias $kriterias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kriterias  $kriterias
     * @return \Illuminate\Http\Response
     */
    public function edit(kriterias $kriterias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kriterias  $kriterias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kriterias $kriterias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kriterias  $kriterias
     * @return \Illuminate\Http\Response
     */
    public function destroy(kriterias $kriterias)
    {
        //
    }
}
