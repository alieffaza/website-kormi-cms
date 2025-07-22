<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'pesan' => 'required|string|max:1000',
        ]);

        // Kirim email
        Mail::raw(
            "Pesan dari: {$validated['nama']} <{$validated['email']}>

{$validated['pesan']}",
            function ($message) use ($validated) {
                $message->to('kormikaltim.website@gmail.com')
                        ->subject('Pesan Kontak dari Website KORMI Kaltim');
            }
        );

        return back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
