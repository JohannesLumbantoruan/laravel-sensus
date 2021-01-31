@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')
    @include('navigation')

    <div class="container">
        <div class="jumbotron text-center">
            <h1>Sistem Informasi Penduduk</h1>
            <h3>WEB ini adalah Sistem Informasi Penduduk yang dibuat menggunakan framework Laravel</h3>
            <h4>Selamat datang, <b>{{ Auth::guard('admin')->user()->nama }}</b></h4>
        </div>
        <div class="row text-white">
            <div class="col-md-4">
                <div class="card bg-primary">
                    <div class="card-header">
                        <h2>Jumlah Warga <i class="fa fa-users float-right"></i></h2>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold">{{ $warga }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-success">
                    <div class="card-header">
                        <h2>Jumlah Desa <i class="fa fa-database float-right"></i></h2>
                    </div>
                    <div class="card-body">
                        <h1 class="font-weight-bold text-center">{{ $desa }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-warning">
                    <div class="card-header">
                        <h2>Jumlah Dusun <i class="fa fa-table float-right"></i></h2>
                    </div>
                    <div class="card-body">
                        <h1 class="font-weight-bold text-center">{{ $dusun }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection