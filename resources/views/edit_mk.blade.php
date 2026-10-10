@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="glass-card p-4 p-md-5">

                <!-- Header -->
                <div class="text-center mb-4">
                    <div class="d-inline-flex p-3 rounded-circle mb-3" style="background: rgba(99, 102, 241, 0.15); border: 1px solid rgba(99, 102, 241, 0.3);">
                        <i class="fa-solid fa-pen-to-square fs-2 text-warning"></i>
                    </div>
                    <h3 class="fw-bold gradient-text">Edit Mata Kuliah</h3>
                    <p class="text-secondary small">Perbarui data mata kuliah yang sudah tersimpan di database.</p>
                </div>

                <!-- Error Validation -->
                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger" style="background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3); color: #f87171;">
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Edit Mata Kuliah -->
                @php
                    $itemMk = $mk ?? $mataKuliah;
                @endphp

                <form action="{{ route('matakuliah.update', $itemMk->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nama Mata Kuliah -->
                    <div class="mb-4">
                        <label for="nama_mk" class="form-label text-light fw-medium">
                            <i class="fa-solid fa-book-open me-2 text-primary"></i>
                            Nama Mata Kuliah
                        </label>
                        <input
                            type="text"
                            class="form-control text-light p-3 rounded-3"
                            id="nama_mk"
                            name="nama_mk"
                            value="{{ old('nama_mk', $itemMk->nama_mk) }}"
                            placeholder="Contoh: Pemrograman Web Lanjut"
                            required
                            style="background: rgba(15, 23, 42, 0.6) !important; border-color: rgba(255, 255, 255, 0.15) !important;"
                        >
                    </div>

                    <!-- SKS -->
                    <div class="mb-4">
                        <label for="sks" class="form-label text-light fw-medium">
                            <i class="fa-solid fa-layer-group me-2 text-primary"></i>
                            Jumlah SKS
                        </label>
                        <input
                            type="number"
                            class="form-control text-light p-3 rounded-3"
                            id="sks"
                            name="sks"
                            value="{{ old('sks', $itemMk->sks) }}"
                            placeholder="Contoh: 3"
                            min="1"
                            max="6"
                            required
                            style="background: rgba(15, 23, 42, 0.6) !important; border-color: rgba(255, 255, 255, 0.15) !important;"
                        >
                    </div>

                    <!-- Button -->
                    <div class="d-flex gap-2">
                        <a
                            href="{{ route('matakuliah.index') }}"
                            class="btn btn-outline-secondary p-3 rounded-3 w-50 fw-semibold text-light border-0"
                            style="background: rgba(255, 255, 255, 0.05);"
                        >
                            Kembali
                        </a>
                        <button
                            type="submit"
                            class="btn btn-gradient p-3 rounded-3 w-50 fw-bold"
                        >
                            <i class="fa-solid fa-save me-2"></i>
                            Update
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection