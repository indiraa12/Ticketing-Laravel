@extends('dashboard/layouts/main')
@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                @foreach ($errors->all() as $item)
                    {{ $item }}
                @endforeach
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" align="center">Edit Rute Perjalanan |
                                {{ $rute->transportation->format_kode }}</h4>
                            <form method="POST" action="{{ route('rutes.update', $rute->id) }}">
                                @csrf
                                @method('put')
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Tujuan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tujuan" class="form-control" id="basic-default-company"
                                            value="{{ $rute->tujuan }}" placeholder="Masukkan tujuan" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Rute Awal</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="rute_awal" class="form-control"
                                            value="{{ $rute->rute_awal }}" id="basic-default-company"
                                            placeholder="Masukkan rute_awal" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Rute Akhir</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="rute_akhir" class="form-control"
                                            value="{{ $rute->rute_akhir }}" id="basic-default-company"
                                            placeholder="Masukkan rute_akhir" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="harga" class="form-control" id="basic-default-company"
                                            value="{{ $rute->harga }}" placeholder="Masukkan harga" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="bandara_id">Kode</label>
                                    <div class='col-sm-10'>
                                        <select name="transportation_id" class="form-control" required>
                                            <option value="" disabled selected>Pilih Transportasi</option>
                                            @foreach ($transportations as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $rute->transportation_id ? 'selected' : '' }}>
                                                    {{ $item->format_kode }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('rutes.index') }}" class="btn btn-secondary btn-sm mr-2">Cancel</a>
                                    <button type="submit" class="btn btn-warning btn-sm mr-2">Edit</button>
                                </div>
                            </form>
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
