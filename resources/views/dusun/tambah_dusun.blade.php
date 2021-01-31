@extends('layouts.template')

@section('title', 'Tambah Dusun')

@section('content')
    @include('navigation')

    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h2 class="font-weight-bold text-center">Tambah Dusun</h2>
                </div>
                <div class="card-body">
                <form action="{{ route('tambahDusunAksi') }}" method="POST">
                    @csrf
                        @if (Session::has('error'))
                            <div class="alert alert-danger text-center">
                                {{ Session::get('error') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="desa" class="font-weight-bold">Desa</label>
                            <select name="desa" class="form-control">
                                <option value="">-Pilih-</option>
                                @foreach ($desa as $d)
                                <option value="{{ $d->desa_id }}">{{ $d->desa_nama }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('desa') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="dusun" class="font-weight-bold">Dusun</label>
                            <input type="text" name="dusun" class="form-control" placeholder="Masukkan nama dusun" value="{{ old('dusun') }}">
                            <span class="text-danger">@error('dusun') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Tambah">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection