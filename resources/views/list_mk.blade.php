@extends('layouts.app')

@section('content')

<div class="container my-4">

    <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>

            <h2 class="fw-bold gradient-text mb-1">

                <i class="fa-solid fa-book me-2"></i>

                Daftar Mata Kuliah

            </h2>

            <p class="text-secondary mb-0">

                Daftar mata kuliah yang tersimpan di dalam sistem.

            </p>

        </div>


        <a
            href="{{ route('matakuliah.create') }}"
            class="btn btn-gradient px-4 py-2 rounded-4 d-inline-flex align-items-center gap-2"
        >

            <i class="fa-solid fa-plus-circle fs-5"></i>

            <span>Tambah Mata Kuliah</span>

        </a>

    </div>


    <!-- Success Message -->
    @if (session('success'))

        <div class="alert alert-success">

            <i class="fa-solid fa-circle-check me-2"></i>

            {{ session('success') }}

        </div>

    @endif


    <!-- Table -->
    <div class="glass-card p-4">

        <div class="table-responsive">

            <table class="table table-dark table-hover align-middle mb-0">

                <thead>

                    <tr>

                        <th width="8%">No</th>

                        <th>Nama Mata Kuliah</th>

                        <th width="15%">SKS</th>

                        <th width="35%">UUID</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($mataKuliah as $index => $mk)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>

                            <td class="fw-semibold">

                                {{ $mk->nama_mk }}

                            </td>

                            <td>

                                <span class="badge bg-primary">

                                    {{ $mk->sks }} SKS

                                </span>

                            </td>

                            <td>

                                <small class="text-info">

                                    {{ $mk->id }}

                                </small>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="4"
                                class="text-center text-secondary py-5"
                            >

                                <i class="fa-solid fa-database fs-2 mb-3 d-block"></i>

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