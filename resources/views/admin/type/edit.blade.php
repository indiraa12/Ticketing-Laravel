@extends('dashboard/layouts/main')
@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" align="center">Edit Type Transportasi | {{ $type->full_name }}</h4>
                            <form method="POST" action="{{ route('type.update', $type->id) }}">
                                @method('put')
                                @csrf

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="nama_type">Tipe Transportasi</label>
                                    <div class='col-sm-10'>
                                        <select name="nama_type" value="{{ $type->nama_type }}" class="form-control"
                                            required>
                                            <option value="" disabled selected>Pilih Disini</option>
                                            <option value="Pesawat" {{ $type->nama_type == 'Pesawat' ? 'selected' : '' }}>
                                                Pesawat</option>
                                            <option value="Kereta" {{ $type->nama_type == 'Kereta' ? 'selected' : '' }}>
                                                Kereta</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Keterangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="keterangan" value="{{ $type->keterangan }}"
                                            class="form-control" id="basic-default-company"
                                            placeholder="Masukkan keterangan" />
                                    </div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('type.index') }}" class="btn btn-secondary btn-sm mr-2">Cancel</a>
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
