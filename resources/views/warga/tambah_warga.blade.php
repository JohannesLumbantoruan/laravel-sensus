@extends('layouts.template')

@section('title', 'Tambah Warga')

@section('content')
    @include('navigation')

    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h2 class="font-weight-bold text-center">Tambah Warga</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('tambahWargaAksi') }}" method="POST">
                    @csrf
                        @if (Session::has('error'))
                            <div class="alert alert-danger text-center">
                                {{ Session::get('error') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama warga" value="{{ old('nama') }}">
                            <span class="text-danger">@error('nama') {{ $message  }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="ktp" class="font-weight-bold">No. KTP</label>
                            <input type="number" name="ktp" class="form-control" placeholder="Masukkan no. ktp" value="{{ old('ktp') }}">
                            <span class="text-danger">@error('ktp') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="jk" class="font-weight-bold">Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="">-Pilih-</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <span class="text-danger">@error('jk') {{ $message }} @enderror</span>
                        </div>
                        
                        <div class="form-group">
                            <label for="desa" class="font-weight-bold">Desa</label>
                            <select name="desa" class="form-control">
                                <option value="">-Pilih-</option>
                                @foreach ($desa as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('desa') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="dusun" class="font-weight-bold">Dusun</label>
                            <select name="dusun" class="form-control">
                                <option value="">-Pilih-</option>
                            </select>
                            <span class="text-danger">@error('dusun') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="rt" class="font-weight-bold">RT</label>
                            <input type="text" name="rt" class="form-control" placeholder="Masukkan RT" value="{{ old('rt') }}">
                            <span class="text-danger">@error('rt') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="rw" class="font-weight-bold">RW</label>
                            <input type="text" name="rw" class="form-control" placeholder="Masukkan RW" value="{{ old('rw') }}">
                            <span class="text-danger">@error('rw') {{ $message }} @enderror</span>
                        </div>
                        
                        <div class="form-group">
                            <label for="status" class="font-weight-bold">Status</label>
                            <select name="status" class="form-control">
                                <option value="">-Pilih-</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                            </select>
                            <span class="text-danger">@error('status') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="pendidikan" class="font-weight-bold">Pendidikan Terakhir</label>
                            <select name="pendidikan" class="form-control">
                                <option value="">-Pilih-</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                            <span class="text-danger">@error('pendidikan') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="agama" class="font-weight-bold">Agama</label>
                            <select name="agama" class="form-control">
                                <option value="">-Pilih-</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Kong Hu Cu">Kong Hu Cu</option>
                            </select>
                            <span class="text-danger">@error('agama') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Tambah">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="desa"]').on('change', function() {
                var desaID = $(this).val();
                if (desaID) {
                    $.ajax( {
                        url: '/dusun/ajax/'+desaID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="dusun"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="dusun"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }
                else {
                    $('select[name="dusun"]').empty();
                }
            });
        });
    </script>
@endsection