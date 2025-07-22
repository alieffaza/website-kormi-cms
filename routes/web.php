<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MainBeritaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $inorgas = \App\Models\Inorga::orderBy('nama')->get();
    $beritas = \App\Models\Berita::with('kategori')->orderByDesc('created_at')->limit(6)->get();
    // Ambil kategori pengumuman dan event
    $kategoriPengumuman = \App\Models\Kategori::where('nama', 'pengumuman')->first();
    $kategoriEvent = \App\Models\Kategori::where('nama', 'event')->first();
    $pengumuman = $kategoriPengumuman ? \App\Models\Berita::where('kategori_id', $kategoriPengumuman->id)->orderByDesc('created_at')->limit(3)->get() : collect();
    $events = $kategoriEvent ? \App\Models\Berita::where('kategori_id', $kategoriEvent->id)->orderByDesc('created_at')->limit(3)->get() : collect();
    // Profile ketua (static, bisa diganti dinamis nanti)
    $profile_ketua = [
        'nama' => 'Nama Ketua',
        'foto' => '/assets/img/ketua.jpg', // pastikan file ada
        'sambutan' => 'Selamat datang di KORMI Kaltim! Mari bersama membangun olahraga masyarakat yang sehat dan bahagia.'
    ];
    return view('main.landing', compact('inorgas', 'beritas', 'pengumuman', 'events', 'profile_ketua'));
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
    Route::get('users/editors', [UserController::class, 'editorIndex'])->name('users.editors');
    Route::get('users/editors/create', [UserController::class, 'createEditor'])->name('users.create_editor');
    Route::post('users/editors', [UserController::class, 'storeEditor'])->name('users.store_editor');
    Route::get('users/editors/{user}/edit', [UserController::class, 'editEditor'])->name('users.edit_editor');
    Route::put('users/editors/{user}', [UserController::class, 'updateEditor'])->name('users.update_editor');
    Route::get('users/{user}/print', [UserController::class, 'print'])->name('users.print');
    Route::get('users/print/all', [UserController::class, 'printAll'])->name('users.printAll');
    Route::resource('roles', RoleController::class);
    Route::resource('admin/content/inorga', App\Http\Controllers\InorgaController::class, [
        'as' => 'content'
    ])->except(['show']);
    Route::resource('admin/content/kategori', App\Http\Controllers\KategoriController::class, [
        'as' => 'content'
    ])->except(['show']);
    Route::resource('admin/content/halaman', App\Http\Controllers\HalamanController::class, [
        'as' => 'content'
    ])->except(['show']);
    Route::resource('admin/content/berita', App\Http\Controllers\BeritaController::class, [
        'as' => 'content'
    ]);
    Route::post('admin/ckeditor/upload', [\App\Http\Controllers\BeritaController::class, 'ckeditorUpload'])->name('ckeditor.upload');
    Route::resource('admin/content/struktur_organisasi', App\Http\Controllers\StrukturOrganisasiController::class, [
        'as' => 'content'
    ]);
});

Route::get('/halaman/{slug}', function($slug) {
    $halaman = \App\Models\Halaman::where('slug', $slug)->firstOrFail();
    return view('main.halaman', compact('halaman'));
})->name('main.halaman');

Route::get('/tentang', function() {
    $halaman = (object)[
        'judul' => 'Tentang KORMI Kaltim',
        'isi' => '', // Tidak dipakai, karena view sudah tabbed
    ];
    return view('main.halaman', compact('halaman'));
})->name('main.tentang');

Route::get('/hubungi-kami', function() {
    return view('main.hubungi');
})->name('main.hubungi');

Route::post('/kontak/kirim', [\App\Http\Controllers\ContactController::class, 'send'])->name('kontak.kirim');

Route::get('/berita', [MainBeritaController::class, 'berita'])->name('main.berita');
Route::get('/event', [MainBeritaController::class, 'event'])->name('main.event');
Route::get('/pengumuman', [MainBeritaController::class, 'pengumuman'])->name('main.pengumuman');
Route::get('/berita/{slug}', [MainBeritaController::class, 'detail'])->name('main.berita.detail');
Route::get('/inorga/{slug}', function($slug) {
    $inorga = \App\Models\Inorga::where('slug', $slug)->firstOrFail();
    return view('main.inorga_detail', compact('inorga'));
})->name('main.inorga.detail');

Route::view('/sejarah', 'main.sejarah')->name('main.sejarah');
Route::view('/visi-misi', 'main.visi_misi')->name('main.visi_misi');
Route::view('/struktur-organisasi', 'main.struktur_organisasi')->name('main.struktur_organisasi');
Route::get('/daftar-inorga', function() {
    $inorgas = \App\Models\Inorga::orderBy('nama')->get();
    return view('main.daftar_inorga', compact('inorgas'));
})->name('main.daftar_inorga');

require __DIR__.'/auth.php';
