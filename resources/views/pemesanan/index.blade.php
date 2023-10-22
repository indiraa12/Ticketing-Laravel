@extends('dashboard/layouts/main')
@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" align="center">Laporan Pemesanan {{ auth()->user()->name }}</h4>
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
                                            <th class="text-center">No</th>
                                            <th>Kode Pemesanan</th>
                                            <th>Nama</th>
                                            <th>Tujuan</th>
                                            <th class="text-center">Tanggal Berangkat</th>
                                            <th class="text-center">Jam Cekin</th>
                                            <th class="text-center">Jam Berangkat</th>
                                            <th class="text-center">Total Bayar</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    @forelse ($payments as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_pemesanan }}</td>
                                            <td>{{ $item->penumpang->name }}</td>
                                            <td>{{ $item->rute->tujuan }}</td>
                                            <td class="text-center">
                                                {{ Carbon\Carbon::parse($item->tanggal_berangkat)->translatedFormat('l, d F Y') }}
                                            </td>
                                            <td class="text-center">
                                                {{ Carbon\Carbon::parse($item->jam_cekin)->translatedFormat('H:i') }} WIB
                                            </td>
                                            <td class="text-center">
                                                {{ Carbon\Carbon::parse($item->jam_berangkat)->translatedFormat('H:i') }}
                                                WIB
                                            </td>
                                            <td class="text-center">{{ formatRupiah($item->total_bayar) }}</td>
                                            <td class="text-center">
                                                <label class="badge badge-success">Paid</label>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('pemesanan.show', $item->id) }}"
                                                    class="btn btn-outline-linkedin btn-sm">
                                                    <i class="ti-new-window"></i>
                                                    Detail</a>

                                                <form onsubmit="return confirm('apakah anda yakin ingin menghapus?')"
                                                    class="d-inline" action="{{ route('pemesanan.destroy', $item->id) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        Hapus
                                                    </button>
                                                </form>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">Data Kosong</td>
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
