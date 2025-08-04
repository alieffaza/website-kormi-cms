@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row"> 
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pengguna</p>
                            <h5 class="font-weight-bolder">123</h5>
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%</span> bulan ini</p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="material-icons text-lg opacity-10">people</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Berita</p>
                            <h5 class="font-weight-bolder">45</h5>
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+2%</span> bulan ini</p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                            <i class="material-icons text-lg opacity-10">article</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Agenda</p>
                            <h5 class="font-weight-bolder">12</h5>
                            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-1%</span> bulan ini</p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                            <i class="material-icons text-lg opacity-10">event</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">User Aktif</p>
                            <h5 class="font-weight-bolder">100</h5>
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3%</span> bulan ini</p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                            <i class="material-icons text-lg opacity-10">check_circle</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tambahkan komponen lain dari analytics.html sesuai kebutuhan -->
@endsection
