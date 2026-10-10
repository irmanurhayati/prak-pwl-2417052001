<nav class="navbar navbar-expand-lg sticky-top" style="background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2 fw-bold fs-4" href="{{ route('user.index') }}">
      <div class="rounded-3 p-2 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #6366f1, #a855f7); width: 38px; height: 38px;">
        <i class="fa-solid fa-code text-white fs-6"></i>
      </div>
      <span class="gradient-text">PWL Portal</span>
    </a>
    <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <i class="fa-solid fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto gap-2 mt-3 mt-lg-0 align-items-lg-center">
        <li class="nav-item">
          <a class="nav-link px-3 rounded-pill text-light fw-medium d-flex align-items-center gap-2" href="{{ route('user.index') }}">
            <i class="fa-solid fa-users text-info"></i> Daftar User
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 rounded-pill text-light fw-medium d-flex align-items-center gap-2" href="{{ route('matakuliah.index') }}">
            <i class="fa-solid fa-book-open text-warning"></i> Mata Kuliah
          </a>
        </li>
        <li class="nav-item ms-lg-2">
          <a class="btn btn-outline-info rounded-pill px-3 d-flex align-items-center gap-2" href="{{ route('user.create') }}">
            <i class="fa-solid fa-user-plus"></i> + User
          </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-gradient rounded-pill px-3 d-flex align-items-center gap-2" href="{{ route('matakuliah.create') }}">
            <i class="fa-solid fa-plus"></i> + Mata Kuliah
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
