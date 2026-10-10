@extends('layouts.app')

@section('content')
<div class="container my-4">

    <!-- Header Section -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold gradient-text mb-1">
                <i class="fa-solid fa-book me-2"></i>Daftar Mata Kuliah
            </h2>
            <p class="text-secondary mb-0">
                Daftar mata kuliah yang tersimpan di dalam sistem.
            </p>
        </div>

        <a href="{{ route('matakuliah.create') }}" class="btn btn-gradient px-4 py-2 rounded-4 d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-plus-circle fs-5"></i>
            <span>Tambah Mata Kuliah</span>
        </a>
    </div>

    <!-- Alert Notifikasi Sukses -->
    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center mb-4" role="alert" style="background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.3); color: #34d399;">
            <i class="fa-solid fa-circle-check fs-5 me-2"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    <!-- Table Card -->
    <div class="glass-card p-4">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0" style="background: transparent;">
                <thead>
                    <tr class="text-uppercase text-secondary fs-7" style="border-bottom: 2px solid rgba(255, 255, 255, 0.1);">
                        <th class="py-3 px-4" width="8%">No</th>
                        <th class="py-3 px-4">Nama Mata Kuliah</th>
                        <th class="py-3 px-4" width="15%">SKS</th>
                        <th class="py-3 px-4" width="30%">UUID</th>
                        <th class="py-3 px-4 text-center" width="20%">Aksi</th>
                    </tr>
                </thead>

                <tbody style="border-top: none;">
                    @forelse (($mks ?? $mataKuliah) as $index => $mk)
                        <tr style="border-bottom: 1px solid rgba(255, 255, 255, 0.05); transition: all 0.2s;">
                            <td class="py-3 px-4 fw-bold text-muted">
                                {{ $loop->iteration }}
                            </td>

                            <td class="py-3 px-4 fw-semibold text-light">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-book-bookmark text-primary"></i>
                                    <span>{{ $mk->nama_mk }}</span>
                                </div>
                            </td>

                            <td class="py-3 px-4">
                                <span class="badge px-3 py-2 rounded-pill fw-semibold" style="background: rgba(59, 130, 246, 0.2); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.4);">
                                    <i class="fa-solid fa-layer-group me-1"></i> {{ $mk->sks }} SKS
                                </span>
                            </td>

                            <td class="py-3 px-4">
                                <small class="text-info font-monospace">
                                    {{ $mk->id }}
                                </small>
                            </td>

                            <td class="py-3 px-4 text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('matakuliah.edit', $mk->id) }}"
                                       class="btn btn-sm btn-outline-warning rounded-3 d-inline-flex align-items-center gap-1 px-3 py-1">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span>Edit</span>
                                    </a>

                                    <form action="{{ route('matakuliah.destroy', $mk->id) }}"
                                          method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger rounded-3 d-inline-flex align-items-center gap-1 px-3 py-1"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fa-solid fa-trash"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-5">
                                <i class="fa-solid fa-database fs-2 mb-3 d-block text-muted"></i>
                                Belum ada data mata kuliah.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection