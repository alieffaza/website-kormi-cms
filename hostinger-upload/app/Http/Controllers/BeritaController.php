<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::with('kategori')->orderByDesc('created_at')->paginate(10);
        return view('admin.content.berita', compact('beritas'));
    }

    public function create()
    {
        $kategoris = Kategori::orderBy('nama')->get();
        return view('admin.content.berita', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }
        Berita::create($validated);
        return redirect()->route('content.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $beritum)
    {
        $kategoris = Kategori::orderBy('nama')->get();
        $berita = $beritum;
        return view('admin.content.berita', ['berita' => $beritum, 'kategoris' => $kategoris]);
    }

    public function update(Request $request, Berita $beritum)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }
        $beritum->update($validated);
        return redirect()->route('content.berita.index')->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy(Berita $beritum)
    {
        $beritum->delete();
        return redirect()->route('content.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function ckeditorUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $path = $request->file('upload')->store('berita', 'public');
            $url = asset('storage/' . $path);
            // CKEditor expects a JS callback
            return response()->json([
                'uploaded' => 1,
                'fileName' => basename($path),
                'url' => $url,
            ]);
        }
        return response()->json(['uploaded' => 0, 'error' => ['message' => 'Upload gagal']]);
    }
}
