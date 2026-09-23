@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h2 class="fw-extrabold gradient-text mb-1"><i class="fa-solid fa-users-gear me-2"></i>Daftar Pengguna</h2>
            <p class="text-secondary mb-0">Kelola informasi data mahasiswa dan kelas yang terdaftar</p>
        </div>
        <a href="{{ route('user.create') }}" class="btn btn-gradient px-4 py-2 rounded-4 d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-plus-circle fs-5"></i>
            <span>Tambah Pengguna Baru</span>
        </a>
    </div>

    <!-- Table Card -->
    <div class="glass-card p-4">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0" style="background: transparent;">
                <thead>
                    <tr class="text-uppercase text-secondary fs-7" style="border-bottom: 2px solid rgba(255, 255, 255, 0.1);">
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Nama Mahasiswa</th>
                        <th class="py-3 px-4">NPM / NIM</th>
                        <th class="py-3 px-4 text-center">Kelas</th>
                    </tr>
                </thead>
                <tbody style="border-top: none;">
                    @forelse ($users as $user)
                    <tr style="border-bottom: 1px solid rgba(255, 255, 255, 0.05); transition: all 0.2s;">
                        <td class="py-3 px-4 fw-bold text-muted">#{{ $user->id }}</td>
                        <td class="py-3 px-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width: 40px; height: 40px; background: linear-gradient(135deg, #3b82f6, #8b5cf6);">
                                    {{ strtoupper(substr($user->nama, 0, 1)) }}
                                </div>
                                <span class="fw-semibold text-light">{{ $user->nama }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            <span class="badge bg-dark border border-secondary text-info px-3 py-2 rounded-3 font-monospace">
                                {{ $user->nim }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <span class="badge px-3 py-2 rounded-pill fw-semibold" style="background: rgba(168, 85, 247, 0.2); color: #c084fc; border: 1px solid rgba(168, 85, 247, 0.4);">
                                <i class="fa-solid fa-graduation-cap me-1"></i> {{ $user->nama_kelas }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-folder-open fs-1 mb-3 d-block"></i>
                            Belum ada data pengguna yang tersimpan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection