<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Menampilkan daftar mata kuliah.
     */
    public function index()
    {
        $data = [
            'title' => 'Daftar Mata Kuliah',
            'mks' => MataKuliah::all(),
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
            'nama_mk' => $request->input('nama_mk'),
            'sks' => $request->input('sks'),
        ]);

        return redirect()->to('/mata-kuliah')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit mata kuliah berdasarkan UUID.
     */
    public function edit($id)
    {
        $mk = MataKuliah::findOrFail($id);

        return view('edit_mk', [
            'title' => 'Edit Mata Kuliah',
            'mk' => $mk,
            'mataKuliah' => $mk,
        ]);
    }

    /**
     * Menyimpan perubahan mata kuliah ke database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mk' => 'required',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        $mk = MataKuliah::findOrFail($id);
        $mk->update([
            'nama_mk' => $request->input('nama_mk'),
            'sks' => $request->input('sks'),
        ]);

        return redirect()->to('/mata-kuliah')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Menghapus data mata kuliah dari database.
     */
    public function destroy($id)
    {
        $mk = MataKuliah::findOrFail($id);
        $mk->delete();

        return redirect()->to('/mata-kuliah')->with('success', 'Data berhasil dihapus!');
    }
}