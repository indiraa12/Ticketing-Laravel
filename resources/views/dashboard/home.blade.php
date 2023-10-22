@extends('dashboard/layouts/main')
@section('konten')

    <div class="main-panel">
        <div class="content-wrapper">
            @if (Auth::user()->role_id == 1)
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                <h3 class="font-weight-bold">Welcome, @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                        {{ auth()->user()->name }}
                                    @endif
                                </h3>
                                <h6 class="font-weight-normal mb-0"> Maksimalkan pengalaman Anda di sini!</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card tale-bg">
                            <div class="card-people mt-auto">
                                <img src="{{ asset('skydash/template') }}/images/dashboard/people.svg" alt="people">
                                <div class="weather-info">
                                    <div class="d-flex">
                                        <div>
                                            <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup>
                                            </h2>
                                        </div>
                                        <div class="ml-2">
                                            <h4 class="location font-weight-normal">Bawang</h4>
                                            <h6 class="font-weight-normal">Indonesia</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin transparent">
                        <div class="row">
                            <div class="col-md-6 mb-4 stretch-card transparent">
                                <div class="card card-tale">
                                    <div class="card-body">
                                        <p class="mb-4">Total User</p>
                                        <p class="fs-30 mb-2">{{ $users }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 stretch-card transparent">
                                <div class="card card-dark-blue">
                                    <div class="card-body">
                                        <p class="mb-4">Pendapatan Keseluruhan</p>
                                        <h4 class="mb-2">{{ formatRupiah($pendapatan) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                <div class="card card-light-blue">
                                    <div class="card-body">
                                        <p class="mb-4">Pendapatan Hari ini</p>
                                        <h4 class="mb-2">{{ formatRupiah($pendapatanHariIni) }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 stretch-card transparent">
                                <div class="card card-light-danger">
                                    <div class="card-body">
                                        <p class="mb-4">Total Pemesanan</p>
                                        <p class="fs-30 mb-2">{{ $totalPemesanan }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Total Pemesanan</p>
                                <p class="fs-30 mb-2">4006</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            @else
                <!-- Halaman Penumpang -->
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                <h3 class="font-weight-bold">Welcome, @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                        {{ auth()->user()->name }}!
                                    @endif
                                </h3>
                                <h6 class="font-weight-normal mb-0"> Maksimalkan pengalaman Anda di sini!</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Mau Kemana Hari Ini?</h4>
                            <hr class="hr" />

                            <form action="{{ route('dashboard') }}" method="get" class="form-inline">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="mr-3">
                                        <label for="dari" class="col-form-label d-block">Dari</label>
                                        <select name="rute_awal" class="form-control" id="inlineFormInputName2" required>
                                            <option value="" disabled selected>Masukan Tujuan di Sini
                                            </option>
                                            @foreach ($ruteAwal as $item)
                                                <option value="{{ $item }}"
                                                    {{ request()->rute_awal == $item ? 'selected' : '' }}>
                                                    {{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mr-3">
                                        <label for="dari" class="col-form-label d-block">Ke</label>
                                        <select name="rute_akhir" class="form-control" id="inlineFormInputName2" required>
                                            <option value="" disabled selected>Masukan Tujuan Disini</option>
                                            @foreach ($ruteAkhir as $item)
                                                <option value="{{ $item }}"
                                                    {{ request()->rute_akhir == $item ? 'selected' : '' }}>
                                                    {{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mr-3">
                                        <label for="dari" class="col-form-label d-block">Pilih
                                            Transportasi</label>
                                        <select name="transportation" class="form-control" required>
                                            <option value="" disabled selected>Pilih Transportasi</option>
                                            @foreach ($transportations as $item)
                                                <option value="{{ $item }}"
                                                    {{ request()->transportation == $item ? 'selected' : '' }}>
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cari Tiket</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Stasiun & Bandara</h4>
                            <hr class="hr" />
                            <p class="card-description">
                                <a href="{{ route('dashboard') }}" class="icon-sm">
                                    <i class="ti-reload mr-1"></i> Bersihkan Pencarian
                                </a>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> No </th>
                                            <th> Kode </th>
                                            <th> Berangkat </th>
                                            <th> Tiba </th>
                                            <th> Transportasi </th>
                                            <th> Harga </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (request()->rute_awal == null && request()->rute_akhir == null && request()->transportation == null)
                                            <tr>
                                                <td colspan="7" align="center">
                                                    Cari Tiket Anda Disini
                                                </td>
                                            </tr>
                                        @else
                                            @forelse ($rutes as $item)
                                                <tr>
                                                    <td class="py-1">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        {{ $item->transportation->kode }}
                                                    </td>
                                                    <td>
                                                        {{ $item->rute_awal }}
                                                    </td>
                                                    <td>
                                                        {{ $item->rute_akhir }}
                                                    </td>
                                                    <td>
                                                        {{ $item->transportation->type->full_name }}
                                                    </td>
                                                    <td>
                                                        {{ formatRupiah($item->harga) }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('rutes.pesanan', $item->id) }}"
                                                            class="btn btn-outline-linkedin btn-sm">
                                                            <i class="ti-new-window"></i> Pesan
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" align="center">
                                                        Tiket Tidak Ditemukan
                                                    </td>
                                                </tr>
                                            @endforelse
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endsection
