<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'isi', 'kategori_id', 'gambar'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($berita) {
            $berita->slug = Str::slug($berita->judul);
        });
        static::updating(function ($berita) {
            $berita->slug = Str::slug($berita->judul);
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
