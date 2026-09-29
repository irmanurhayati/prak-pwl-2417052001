<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Menampilkan daftar seluruh mata kuliah.
     */
    public function index()
    {
        $data = [
            'title' => 'Daftar Mata Kuliah',
            'mataKuliah' => MataKuliah::all(),
        ];

        return view('list_mk', $data);
    }

    /**
     * Menampilkan form tambah mata kuliah.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Mata Kuliah',
        ];

        return view('create_mk', $data);
    }

    /**
     * Menyimpan data mata kuliah baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mk' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        MataKuliah::create([
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
        ]);

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }
}