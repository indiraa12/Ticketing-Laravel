@extends('dashboard/layouts/main')
@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4" align="center">Edit Transportasi | {{ $transportation->kode }}</h4>
                            <form method="POST" action="{{ route('transportations.update', $transportation->id) }}">
                                @csrf
                                @method('put')
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Type
                                        Transportasi</label>
                                    <div class="col-sm-10">
                                        <select name="type_id" class="form-control" required>
                                            <option value="" disabled selected>Pilih Transportasi</option>
                                            @foreach ($type_transportations as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $transportation->type_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Jumlah Kursi</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="jumlah_kursi" class="form-control"
                                            value="{{ $transportation->jumlah_kursi }}" id="basic-default-company"
                                            placeholder="Masukkan jumlah kursi" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="ket">Keterangan</label>
                                    <div class='col-sm-10'>
                                        <textarea name="keterangan" class="form-control" id="ket" placeholder="Masukkan keterangan">
                                            {{ $transportation->keterangan }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('transportations.index') }}"
                                        class="btn btn-secondary btn-sm mr-2">Cancel</a>
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
