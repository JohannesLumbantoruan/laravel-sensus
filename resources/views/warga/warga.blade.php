@extends('layouts.template')

@section('title', 'Data Warga')

@section('content')
    @include('navigation')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class='font-weight-bold text-center'>DATA WARGA</h2>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger text-center">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <div class="clearfix mb-2">
                    <form action="{{ route('cariWarga') }}" method="GET">
                        <div class="btn-group float-left">
                            <input type="text" name="cari" class="form-control" placeholder="Cari warga" value="{{ old('cari') }}">
                            <button type="submit" class="btn btn-secondary">
                                <span><i class="fa fa-search"></i></span>
                            </button>
                        </div>
                    </form>

                    <a href="{{ route('tambahWarga') }}" class="btn btn-success float-right"><i class="fa fa-user-plus"></i> Tambah Warga</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>No. KTP</th>
                                <th>JK</th>
                                <th>Desa</th>
                                <th>Dusun</th>
                                <th>RT</th>
                                <th>RW</th>
                                <th>Status</th>
                                <th>Pendidikan</th>
                                <th>Agama</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($warga as $w)
                            <tr>
                            <td>{{ $no++ }}</td>
                                <td>{{ $w->warga_nama }}</td>
                                <td>{{ $w->warga_ktp }}</td>
                                <td>{{ $w->warga_jk }}</td>
                                <td>{{ $w->desa->desa_nama }}</td>
                                <td>{{ $w->dusun->dusun_nama }}</td>
                                <td>{{ $w->warga_rt }}</td>
                                <td>{{ $w->warga_rw }}</td>
                                <td>{{ $w->warga_status }}</td>
                                <td>{{ $w->warga_pendidikan }}</td>
                                <td>{{ $w->warga_agama }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('editWarga', $w->warga_id) }}" class="btn btn-sm btn-warning"><i class="fa fa-wrench"></i> Edit</a>
                                        <a href="{{ route('hapusWarga', $w->warga_id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>

                    <div class="d-flex justify-content-center">
                        {{ $warga->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection