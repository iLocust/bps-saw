<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    function index()
    {
        $data = DB::table('users')->get();
        return view('users', ['data' => $data]);
    }

    public function create()
    {
        return view('features-setting-details', [
            'user' => auth()->user()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'umur' => 'nullable|numeric|max:127',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date|date_format:Y-m-d',
            'domisili_kec' => 'nullable|string|max:255',
            'domisili_desa' => 'nullable|string|max:255',
            'domisili_rt' => 'nullable|numeric|max:255',
            'domisili_rw' => 'nullable|numeric|max:255',
            'domisili_jalan' => 'nullable|string|max:255',
            'kode_post' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:255',
        ]);

        Auth::user()->update([
            'umur' => $request->umur,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'domisili_kec' => $request->domisili_kec,
            'domisili_desa' => $request->domisili_desa,
            'domisili_rt' => $request->domisili_rt,
            'domisili_rw' => $request->domisili_rw,
            'domisili_jalan' => $request->domisili_jalan,
            'kode_post' => $request->kode_post,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbaharui');
    }
}
