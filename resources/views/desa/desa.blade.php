@extends('layouts.template')

@section('title', 'Daftar Desa')

@section('content')
    @include('navigation')

    <div class="container d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="font-weight-bold text-center">Daftar Desa</h2>
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
                        <form action="{{ route('cariDesa') }}" method="GET">
                            <div class="btn-group float-left">
                                <input type="text" name="cari" class="form-control" placeholder="Cari desa" value="{{ old('cari') }}">
                                <button type="submit" class="btn btn-secondary">
                                    <span><i class="fa fa-search"></i></span>
                                </button>
                            </div>
                        </form>
                        <a href="{{ route('tambahDesa') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Tambah Desa</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th width="1%">No.</th>
                                    <th>Nama Desa</th>
                                    <th width="14%">OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($desa as $d)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $d->desa_nama }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('editDesa', $d->desa_id) }}" class="btn btn-sm btn-warning"><i class="fa fa-wrench"></i> Edit</a>
                                            <a href="{{ route('hapusDesa', $d->desa_id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>

                        <div class="d-flex justify-content-center">
                            {{ $desa->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection