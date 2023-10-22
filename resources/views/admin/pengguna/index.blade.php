@extends('dashboard/layouts/main')
@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" align="center">Data Pengguna</h4>
                            <a href="{{ route('pengguna.create') }}" class="btn btn-primary btn-sm">Tambah Pengguna </a>
                            <div class="mb-3"></div>
                            <div class="row">
                                <div class="input-group">
                                    <div class="col-sm-4">
                                        <form action="/admin/pengguna" method="GET">
                                            <input type="text" class="form-control" name="search"
                                                placeholder="Cari Apaa..">
                                    </div>
                                    <button class="btn btn-primary" type="submit" id="button-addon2"><i
                                            class='icon-search'></i></button>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama Pengguna</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Telepon</th>
                                            @if (Auth::user()->role_id == 1)
                                                <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>

                                    @forelse ($data_pengguna as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item['username'] }}</td>
                                            <td>{{ $item['name'] }}</td>
                                            <td>{{ $item['alamat_penumpang'] }}</td>
                                            <td>{{ $item['tgl_lahir'] }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item['telepon'] }}</td>
                                            @if (Auth::user()->role_id == 1)
                                                <td>
                                                    <div class="d-inline-flex">
                                                        <a style="scale: .9" href="{{ route('pengguna.edit', $item->id) }}"
                                                            class="btn btn-warning btn-icon btn-rounded d-flex">
                                                            <i class="ti-pencil-alt m-auto"></i>
                                                        </a>
                                                        <form onsubmit="return confirm('apakah anda yakin?')"
                                                            action="{{ route('pengguna.destroy', $item->id) }}"
                                                            method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button style="scale: .9" type="submit"
                                                                class="btn btn-danger btn-icon btn-rounded">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" align="center">Data Kosong</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 Indi
                    Rahmadani</span>
        </footer>
        <!-- partial -->
    </div>
@endsection
