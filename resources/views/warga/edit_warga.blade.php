@extends('layouts.template')

@section('title', 'Edit Warga')

@section('content')
    @include('navigation')

    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h2 class="font-weight-bold text-center">Edit Warga</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('editWargaAksi', $warga->warga_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        @if (Session::has('error'))
                            <div class="alert alert-danger text-center">
                                {{ Session::get('error') }}
                            </div>
                        @endif

                        <a href="{{ route('warga') }}" class="btn btn-light btn-outline-dark float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <br>

                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama warga" value="{{ $warga->warga_nama }}">
                            <span class="text-danger">@error('nama') {{ $message  }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="ktp" class="font-weight-bold">No. KTP</label>
                            <input type="number" name="ktp" class="form-control" placeholder="Masukkan no. ktp" value="{{ $warga->warga_ktp }}">
                            <span class="text-danger">@error('ktp') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="jk" class="font-weight-bold">Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="">-Pilih-</option>
                                <option <?php if ($warga->warga_jk == "Laki-laki"){echo "selected='selected'";} ?> value="Laki-laki">Laki-laki</option>
                                <option <?php if ($warga->warga_jk == "Perempuan"){echo "selected='selected'";} ?> value="Perempuan">Perempuan</option>
                            </select>
                            <span class="text-danger">@error('jk') {{ $message }} @enderror</span>
                        </div>
                        
                        <div class="form-group">
                            <label for="desa" class="font-weight-bold">Desa</label>
                            <select name="desa" class="form-control">
                                <option value="">-Pilih-</option>
                                @foreach ($desa as $d)
                                <option <?php if($warga->warga_desa == $d->desa_id){echo "selected='selected'";} ?> value="{{ $d->desa_id }}">{{ $d->desa_nama }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('desa') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="dusun" class="font-weight-bold">Dusun</label>
                            <select name="dusun" class="form-control">
                                <option value="">-Pilih-</option>
                                @foreach ($dusun as $d)
                                <option <?php if ($warga->warga_dusun == $d->dusun_id){echo "selected='selected'";} ?> value="{{ $d->dusun_id }}">{{ $d->dusun_nama }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('dusun') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="rt" class="font-weight-bold">RT</label>
                            <input type="text" name="rt" class="form-control" placeholder="Masukkan RT" value="{{ $warga->warga_rt }}">
                            <span class="text-danger">@error('rt') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="rw" class="font-weight-bold">RW</label>
                            <input type="text" name="rw" class="form-control" placeholder="Masukkan RW" value="{{ $warga->warga_rw }}">
                            <span class="text-danger">@error('rw') {{ $message }} @enderror</span>
                        </div>
                        
                        <div class="form-group">
                            <label for="status" class="font-weight-bold">Status</label>
                            <select name="status" class="form-control">
                                <option value="">-Pilih-</option>
                                <option <?php if ($warga->warga_status == "Belum Kawin"){echo "selected='selected'";} ?> value="Belum Kawin">Belum Kawin</option>
                                <option <?php if ($warga->warga_status == "Kawin"){echo "selected='selected'";} ?> value="Kawin">Kawin</option>
                            </select>
                            <span class="text-danger">@error('status') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="pendidikan" class="font-weight-bold">Pendidikan Terakhir</label>
                            <select name="pendidikan" class="form-control">
                                <option value="">-Pilih-</option>
                                <option <?php if ($warga->warga_pendidikan == "SD"){echo "selected='selected'";} ?> value="SD">SD</option>
                                <option <?php if ($warga->warga_pendidikan == "SMP"){echo "selected='selected'";} ?> value="SMP">SMP</option>
                                <option <?php if ($warga->warga_pendidikan == "SMA"){echo "selected='selected'";} ?> value="SMA">SMA</option>
                                <option <?php if ($warga->warga_pendidikan == "S1"){echo "selected='selected'";} ?> value="S1">S1</option>
                                <option <?php if ($warga->warga_pendidikan == "S2"){echo "selected='selected'";} ?> value="S2">S2</option>
                                <option <?php if ($warga->warga_pendidikan == "S3"){echo "selected='selected'";} ?> value="S3">S3</option>
                            </select>
                            <span class="text-danger">@error('pendidikan') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="agama" class="font-weight-bold">Agama</label>
                            <select name="agama" class="form-control">
                                <option value="">-Pilih-</option>
                                <option <?php if ($warga->warga_agama == "Islam"){echo "selected='selected'";} ?> value="Islam">Islam</option>
                                <option <?php if ($warga->warga_agama == "Kristen"){echo "selected='selected'";} ?> value="Kristen">Kristen</option>
                                <option <?php if ($warga->warga_agama == "Katholik"){echo "selected='selected'";} ?> value="Katholik">Katholik</option>
                                <option <?php if ($warga->warga_agama == "Hindu"){echo "selected='selected'";} ?> value="Hindu">Hindu</option>
                                <option <?php if ($warga->warga_agama == "Buddha"){echo "selected='selected'";} ?> value="Buddha">Buddha</option>
                                <option <?php if ($warga->warga_agama == "Kong Hu Cu"){echo "selected='selected'";} ?> value="Kong Hu Cu">Kong Hu Cu</option>
                            </select>
                            <span class="text-danger">@error('agama') {{ $message }} @enderror</span>
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