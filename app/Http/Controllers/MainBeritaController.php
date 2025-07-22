<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MainBeritaController extends Controller
{
    public function berita()
    {
        $kategori = Kategori::where('nama', 'berita')->first();
        $beritas = $kategori ? Berita::where('kategori_id', $kategori->id)->orderByDesc('created_at')->paginate(9) : collect();
        return view('main.berita', compact('beritas'));
    }
    public function event()
    {
        $kategori = Kategori::where('nama', 'event')->first();
        $beritas = $kategori ? Berita::where('kategori_id', $kategori->id)->orderByDesc('created_at')->paginate(9) : collect();
        return view('main.event', compact('beritas'));
    }
    public function pengumuman()
    {
        $kategori = Kategori::where('nama', 'pengumuman')->first();
        $beritas = $kategori ? Berita::where('kategori_id', $kategori->id)->orderByDesc('created_at')->paginate(9) : collect();
        return view('main.pengumuman', compact('beritas'));
    }
    public function detail($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        // Next & Prev
        $next = Berita::where('kategori_id', $berita->kategori_id)
            ->where('id', '>', $berita->id)
            ->orderBy('id', 'asc')
            ->first();
        $prev = Berita::where('kategori_id', $berita->kategori_id)
            ->where('id', '<', $berita->id)
            ->orderBy('id', 'desc')
            ->first();
        // Related
        $related = Berita::where('kategori_id', $berita->kategori_id)
            ->where('id', '!=', $berita->id)
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();
        return view('main.berita_detail', compact('berita', 'prev', 'next', 'related'));
    }
} 