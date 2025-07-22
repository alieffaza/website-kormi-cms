<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HalamanController extends Controller
{
    public function index()
    {
        $halamans = Halaman::orderBy('judul')->paginate(10);
        return view('admin.content.halaman', compact('halamans'));
    }

    public function create()
    {
        return view('admin.content.halaman_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:halamen,slug',
            'isi' => 'required|string',
        ]);
        $slug = $request->slug ?: Str::slug($request->judul);
        Halaman::create([
            'judul' => $request->judul,
            'slug' => $slug,
            'isi' => $request->isi,
        ]);
        return redirect()->route('content.halaman.index')->with('success', 'Halaman berhasil ditambahkan.');
    }

    public function edit(Halaman $halaman)
    {
        return view('admin.content.halaman_edit', compact('halaman'));
    }

    public function update(Request $request, Halaman $halaman)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:halamen,slug,' . $halaman->id,
            'isi' => 'required|string',
        ]);
        $slug = $request->slug ?: Str::slug($request->judul);
        $halaman->update([
            'judul' => $request->judul,
            'slug' => $slug,
            'isi' => $request->isi,
        ]);
        return redirect()->route('content.halaman.index')->with('success', 'Halaman berhasil diperbarui.');
    }

    public function destroy(Halaman $halaman)
    {
        $halaman->delete();
        return redirect()->route('content.halaman.index')->with('success', 'Halaman berhasil dihapus.');
    }
}
