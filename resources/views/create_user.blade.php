@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="glass-card p-4 p-md-5 position-relative overflow-hidden">
                <!-- Background Accent Glow -->
                <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: rgba(168, 85, 247, 0.3); filter: blur(50px); border-radius: 50%;"></div>

                <div class="text-center mb-4">
                    <div class="d-inline-flex p-3 rounded-circle mb-3" style="background: rgba(99, 102, 241, 0.15); border: 1px solid rgba(99, 102, 241, 0.3);">
                        <i class="fa-solid fa-user-plus fs-2 text-info"></i>
                    </div>
                    <h3 class="fw-bold gradient-text">Tambah Pengguna Baru</h3>
                    <p class="text-secondary small">Isi formulir berikut untuk memasukkan data mahasiswa</p>
                </div>

                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label text-light fw-medium small"><i class="fa-solid fa-user me-2 text-primary"></i>Nama Lengkap</label>
                        <input type="text" class="form-control bg-dark border-secondary text-light p-3 rounded-3" id="nama" name="nama" placeholder="Contoh: Irma Nurhayati" required style="background: rgba(15, 23, 42, 0.6) !important; border-color: rgba(255, 255, 255, 0.15) !important;">
                    </div>

                    <div class="mb-3">
                        <label for="npm" class="form-label text-light fw-medium small"><i class="fa-solid fa-id-card me-2 text-primary"></i>NPM / NIM</label>
                        <input type="text" class="form-control bg-dark border-secondary text-light p-3 rounded-3" id="npm" name="npm" placeholder="Contoh: 2417052001" required style="background: rgba(15, 23, 42, 0.6) !important; border-color: rgba(255, 255, 255, 0.15) !important;">
                    </div>

                    <div class="mb-4">
                        <label for="kelas_id" class="form-label text-light fw-medium small"><i class="fa-solid fa-school me-2 text-primary"></i>Kelas</label>
                        <select class="form-select bg-dark border-secondary text-light p-3 rounded-3" name="kelas_id" id="kelas_id" required style="background: rgba(15, 23, 42, 0.6) !important; border-color: rgba(255, 255, 255, 0.15) !important;">
                            <option value="" disabled selected>-- Pilih Kelas --</option>
                            @foreach ($kelas as $kelasItem)
                                <option value="{{ $kelasItem->id }}" class="bg-dark text-light">{{ $kelasItem->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="/user" class="btn btn-outline-secondary p-3 rounded-3 w-50 fw-semibold text-light border-0" style="background: rgba(255, 255, 255, 0.05);">Batal</a>
                        <button type="submit" class="btn btn-gradient p-3 rounded-3 w-50 fw-bold">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection