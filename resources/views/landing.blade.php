@extends('partials.main')

@section('title', 'Whisplock | Landing Page')

@section('content')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">Whisplock</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav fw-semibold">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#cara-kerja">Alur Kerja</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  <!-- Hero Section -->
<div class="container-fluid text-dark py-5 min-vh-100 d-flex align-items-center"
    style="background: linear-gradient(135deg, #e0f0ff 0%, #ffffff 100%);">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Section -->
            <div class="col-md-6 mb-4 mb-md-0 text-center text-md-start">
                <h1 class="fw-bold display-4 mb-3 text-primary">Whisplock</h1>
                <h3 class="fw-semibold mb-3" style="color:#6f42c1;">Laporkan, Lindungi, Perbaiki!</h3>
                <p class="fs-5 text-secondary mb-4">
                    WHISPLOCK hadir sebagai bentuk nyata komitmen kami untuk menjaga integritas
                    dan membangun budaya kerja yang bersih, transparan, serta beretika.
                </p>
                <a href="{{ route('form.index') }}"
                   class="btn btn-gradient btn-lg px-4 py-3 rounded-pill shadow-sm">
                    🚀 Buat Laporan
                </a>
            </div>

            <!-- Right Section -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('img/rtb.jpg') }}" alt="Rumah Talenta BCA"
                    class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</div>

<!-- Cara Kerja Section -->
<div id="cara-kerja" class="container-fluid py-5" style="background-color:#f8faff;">
    <h2 class="text-center fw-bold mb-5 fs-1" style="color:#0d6efd;">Alur Kerja</h2>
    <div class="row g-4 text-center justify-content-center">
        <div class="col-6 col-md">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100 hover-shadow">
                <i class="bi bi-info-circle-fill text-primary fs-1 mb-3"></i>
                <h5 class="fw-bold">1. INFORMATION</h5>
                <p class="text-muted small">Kumpulkan informasi dan bukti terkait pelanggaran</p>
            </div>
        </div>
        <div class="col-6 col-md">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100 hover-shadow">
                <i class="bi bi-file-earmark-text-fill text-success fs-1 mb-3"></i>
                <h5 class="fw-bold">2. REPORT</h5>
                <p class="text-muted small">Melaporkan informasi pada Whisplock</p>
            </div>
        </div>
        <div class="col-6 col-md">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100 hover-shadow">
                <i class="bi bi-search text-warning fs-1 mb-3"></i>
                <h5 class="fw-bold">3. CHECKING</h5>
                <p class="text-muted small">Penyelidikan informasi dan bukti di lapangan</p>
            </div>
        </div>
        <div class="col-6 col-md">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100 hover-shadow">
                <i class="bi bi-gear-fill text-danger fs-1 mb-3"></i>
                <h5 class="fw-bold">4. ACTION</h5>
                <p class="text-muted small">Laporan ditindaklanjuti oleh pihak terkait</p>
            </div>
        </div>
        <div class="col-12 col-md">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100 hover-shadow">
                <i class="bi bi-check2-circle text-success fs-1 mb-3"></i>
                <h5 class="fw-bold">5. EVALUATION</h5>
                <p class="text-muted small">Meninjau kembali action yang telah dilakukan</p>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-primary text-white text-center py-4 mt-5">
    <div class="container">
        <h5 class="fw-bold mb-2">Whisplock</h5>
        <p class="mb-1">Laporkan, Lindungi, Perbaiki!</p>
        <small>
            Dibuat oleh: <span class="fw-semibold">Kadek Artika Chintya Meliana</span>,
            <span class="fw-semibold">Ayu Dyta Cahyani</span>,
            <span class="fw-semibold">Livia Priskila Wijaya</span>
        </small>
        <div class="mt-3">
            <small>&copy; {{ date('Y') }} Whisplock. All rights reserved.</small>
        </div>
    </div>
</footer>

<!-- Tambahin CSS -->
<style>
    .btn-gradient {
        background: linear-gradient(90deg, #0d6efd 0%, #6f42c1 100%);
        border: none;
        color: white;
        transition: 0.3s;
    }
    .btn-gradient:hover {
        opacity: 0.9;
        transform: scale(1.05);
    }
    .hover-shadow:hover {
        transform: translateY(-5px);
        transition: 0.3s;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15)!important;
    }
</style>
@endsection



