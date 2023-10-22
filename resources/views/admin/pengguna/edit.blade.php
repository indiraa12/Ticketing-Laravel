@extends('dashboard/layouts/main')
@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            @foreach ($errors->all() as $item)
                {{ $item }}
            @endforeach
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" align="center">Edit Data Pengguna</h4>
                            <form method="POST" action="{{ route('pengguna.update', $pengguna->id) }}">
                                @method('put')
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="username" value="{{ $pengguna->username }}"
                                            class="form-control" id="basic-default-company"
                                            placeholder="Masukkan Username" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="password">Password</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="Masukkan Password" aria-describedby="password" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{ $pengguna->name }}"
                                            class="form-control" id="basic-default-company"
                                            placeholder="Masukkan Nama Lengkap" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat_penumpang"
                                            value="{{ $pengguna->alamat_penumpang }}" class="form-control"
                                            id="basic-default-company" placeholder="Masukkan Alamat" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="tgl_lahir" value="{{ $pengguna->tgl_lahir }}"
                                            class="form-control" id="basic-default-company" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                    <div class='col-sm-10'>
                                        <select name="jenis_kelamin" value="{{ $pengguna->jenis_kelamin }}"
                                            class="form-control" required>
                                            <option value="" disabled selected>Pilih Disini</option>
                                            <option value="Laki-Laki"
                                                {{ $pengguna->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                                                Laki-Laki
                                            </option>
                                            <option value="Perempuan"
                                                {{ $pengguna->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="telepon" value="{{ $pengguna->telepon }}"
                                            class="form-control" id="basic-default-company"
                                            placeholder="Masukkan Nomor Telepon" />
                                    </div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('pengguna.index') }}"
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
