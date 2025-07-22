<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Inorga extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'singkatan', 'deskripsi', 'slug'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($inorga) {
            $inorga->slug = Str::slug($inorga->nama);
        });
        static::updating(function ($inorga) {
            $inorga->slug = Str::slug($inorga->nama);
        });
    }
}
