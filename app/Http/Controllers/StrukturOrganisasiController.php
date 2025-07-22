<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $strukturs = StrukturOrganisasi::orderBy('id')->get();
        return view('admin.content.struktur_organisasi', compact('strukturs'));
    }

    public function create()
    {
        return view('admin.content.struktur_organisasi_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);
        StrukturOrganisasi::create($request->only('nama', 'jabatan'));
        return redirect()->route('content.struktur_organisasi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(StrukturOrganisasi $struktur_organisasi)
    {
        return view('admin.content.struktur_organisasi_edit', compact('struktur_organisasi'));
    }

    public function update(Request $request, StrukturOrganisasi $struktur_organisasi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);
        $struktur_organisasi->update($request->only('nama', 'jabatan'));
        return redirect()->route('content.struktur_organisasi.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(StrukturOrganisasi $struktur_organisasi)
    {
        $struktur_organisasi->delete();
        return redirect()->route('content.struktur_organisasi.index')->with('success', 'Data berhasil dihapus.');
    }
} 