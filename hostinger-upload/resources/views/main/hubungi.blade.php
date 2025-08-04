@extends('main.layouts.app')
@section('content')
<div class="container py-4 px-2">
    <div class="row justify-content-center">
        <div class="col-12 col-xxl-10 mx-auto mb-4">
            <div class="card shadow-sm p-4">
                <h2 class="mb-4 text-center">Hubungi Kami</h2>
                @if(session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('kontak.kirim') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control border" id="nama" name="nama" required placeholder="Nama Anda" style="padding-left: 1rem;">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control border" id="email" name="email" required placeholder="Email Anda" style="padding-left: 1rem;">
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea class="form-control border" id="pesan" name="pesan" rows="4" required placeholder="Pesan untuk KORMI Kaltim" style="padding-left: 1rem;"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-xxl-10 mx-auto mb-2"><!-- mb-2 agar jarak ke footer lebih kecil -->
            <div class="card shadow-sm p-4">
                <h4 class="mb-3 text-center">Alamat Kantor KORMI Kalimantan Timur</h4>
                <div class="mb-2 text-center">
                    Gedung Dispora Prov Kaltim Lantai 2, Jl. K.H. Wahid Hasyim, Sempaja Selatan, Samarinda Utara, Kota Samarinda
                </div>
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15948.39383542759!2d117.1555759!3d-0.4532192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df678bc4c942781%3A0xbdbb37495dede04f!2sDISPORA%20PROV.KALTIM!5e0!3m2!1sen!2sid!4v1718000000000!5m2!1sen!2sid" width="100%" height="350" style="border:0; border-radius:1rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 