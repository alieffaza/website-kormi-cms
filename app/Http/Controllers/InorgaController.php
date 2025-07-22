<?php

namespace App\Http\Controllers;

use App\Models\Inorga;
use Illuminate\Http\Request;

class InorgaController extends Controller
{
    public function index()
    {
        $inorgas = Inorga::orderBy('nama')->paginate(10);
        return view('admin.content.inorga', compact('inorgas'));
    }

    public function create()
    {
        return view('admin.content.inorga_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'singkatan' => 'nullable|string|max:50',
            'deskripsi' => 'nullable|string',
        ]);
        Inorga::create($request->only('nama', 'singkatan', 'deskripsi'));
        return redirect()->route('content.inorga.index')->with('success', 'Inorga berhasil ditambahkan.');
    }

    public function edit(Inorga $inorga)
    {
        return view('admin.content.inorga_edit', compact('inorga'));
    }

    public function update(Request $request, Inorga $inorga)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'singkatan' => 'nullable|string|max:50',
            'deskripsi' => 'nullable|string',
        ]);
        $inorga->update($request->only('nama', 'singkatan', 'deskripsi'));
        return redirect()->route('content.inorga.index')->with('success', 'Inorga berhasil diperbarui.');
    }

    public function destroy(Inorga $inorga)
    {
        $inorga->delete();
        return redirect()->route('content.inorga.index')->with('success', 'Inorga berhasil dihapus.');
    }
}
