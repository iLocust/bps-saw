<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function create()
    {
        return view ('add-user');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:3',
            'role' => 'required|numeric|in:'. implode(',', [User::ROLE_ADMIN, User::ROLE_PEKERJA, User::ROLE_PENGAWAS])
        ]);

        $validated['password'] = app('hash')->make($request->password);

        $user = User::create($validated);
        $user->update([
            'nim' => '3509170' . sprintf("%05d", $user->id)
        ]);


        return redirect()->back()->with('success', 'Pegawai berhasil ditambahkan!');
    }
}
