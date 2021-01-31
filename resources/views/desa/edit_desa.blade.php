@extends('layouts.template')

@section('title', 'Edit Desa')

@section('content')
    @include('navigation')

    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h2 class="font-weight-bold text-center">Edit Desa</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('editDesaAksi', $desa->desa_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        @if (Session::has('error'))
                            <div class="alert alert-danger text-center">
                                {{ Session::get('error') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="desa" class="font-weight-bold">Nama Desa</label>
                            <input type="text" name="desa" class="form-control" placeholder="Masukkan nama desa" value="{{ $desa->desa_nama }}">
                            <span class="text-danger">@error('desa') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection