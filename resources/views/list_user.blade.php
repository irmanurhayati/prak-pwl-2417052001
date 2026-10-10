@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold gradient-text mb-1">
                <i class="fa-solid fa-users-gear me-2"></i>Daftar Pengguna
            </h2>
            <p class="text-secondary mb-0">Kelola informasi data mahasiswa dan kelas yang terdaftar</p>
        </div>
        <a href="{{ route('user.create') }}" class="btn btn-gradient px-4 py-2 rounded-4 d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-plus-circle fs-5"></i>
            <span>Tambah Pengguna Baru</span>
        </a>
    </div>

    <!-- Alert Notifikasi Sukses -->
    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center mb-4" role="alert" style="background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.3); color: #34d399;">
            <i class="fa-solid fa-circle-check fs-5 me-2"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    <!-- Table Card Menggunakan Komponen Dinamis -->
    <div class="glass-card p-4">
        <x-table :users="$users" />
    </div>
</div>
@endsection
