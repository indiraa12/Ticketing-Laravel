@extends('dashboard/layouts/main')
@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Form Pemesanan | {{ $rute->transportation->kode }}</h4>
                            <p class="card-description">
                                {{ Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                            </p>
                            @foreach ($errors->all() as $item)
                                {{ $item }}
                            @endforeach
                            <form onsubmit="return confirm('apakah anda yakin ingin membeli tiket?')"
                                action="{{ route('payments.store') }}" class="forms-sample" method="post">
                                @csrf
                                <input type="hidden" name="rute_id" value="{{ $rute->id }}">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Tanggal Berangkat</label>
                                    <input type="date" value="{{ date('Y-m-d') }}" name="tanggal_berangkat"
                                        class="form-control" id="tanggalBerangkat" placeholder="Tanggal Berangkat">
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleInputUsername1">Nomer Kursi</label>
                                    <input type="text" value="" name="kode_kursi"
                                        class="form-control" id="kode_kursi" placeholder="Nomer Kursi">
                                </div> --}}
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Total Bayar</label>
                                    <input type="number" name="total_bayar" value="{{ $rute->harga }}"
                                        class="form-control" id="totalBayar" placeholder="Total Bayar">
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm mr-1">Pesan Tiket</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-weight-bold mb-3">Detail | {{ auth()->user()->name }}</h5>
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <thead>
                                        <tr>
                                            <th class="pl-0 pb-2 border-bottom">Tanggal Lahir</th>
                                            <th class="border-bottom pb-2">Gender</th>
                                            <th class="border-bottom pb-2">Phone</th>
                                            <th class="border-bottom pb-2">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pl-0">{{ auth()->user()->tgl_lahir }}</td>
                                            <td class="text-muted">{{ auth()->user()->jenis_kelamin }}</td>
                                            <td class="text-muted">{{ auth()->user()->telepon }}</td>
                                            <td class="text-muted">{{ auth()->user()->alamat_penumpang }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-bold mb-3">Detail Tujuan</h5>
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <thead>
                                        <tr>
                                            <th class="pl-0 pb-2 border-bottom">Tujuan</th>
                                            <th class="border-bottom pb-2">Rute Awal</th>
                                            <th class="border-bottom pb-2">Rute Akhir</th>
                                            <th class="border-bottom pb-2">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pl-0">{{ $rute->tujuan }}</td>
                                            <td class="text-muted">{{ $rute->rute_awal }}</td>
                                            <td class="text-muted">{{ $rute->rute_akhir }}</td>
                                            <td class="text-muted">{{ formatRupiah($rute->harga) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-bold mb-3">Detail Transportasi</h5>
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <thead>
                                        <tr>
                                            <th class="pl-0 pb-2 border-bottom">Kode</th>
                                            <th class="border-bottom pb-2">Jumlah Kursi</th>
                                            <th class="border-bottom pb-2">Type Transportasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pl-0">{{ $rute->transportation->kode }}</td>
                                            <td class="text-muted">{{ $rute->transportation->jumlah_kursi }}</td>
                                            <td class="text-muted">{{ $rute->transportation->type->full_name }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
