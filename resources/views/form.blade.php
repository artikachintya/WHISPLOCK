@extends('partials.main')

@section('title', 'Whisplock | Form Pengaduan')

<style>
    .bg-full {
        background-image: url("{{ asset('img/rtb.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        width: 100%;
        min-height: 100vh;
    }
</style>

@section('content')
    <div class="bg-full d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Form Pengaduan</h3>

                    {{-- Pesan sukses --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Pesan error umum --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="reported_person_name" class="form-label">Nama Terlapor</label>
                            <input type="text"
                                   class="form-control @error('reported_person_name') is-invalid @enderror"
                                   id="reported_person_name"
                                   name="reported_person_name"
                                   value="{{ old('reported_person_name') }}"
                                   required>
                            @error('reported_person_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="incident_time" class="form-label">Waktu Kejadian</label>
                            <input type="text"
                                   class="form-control @error('incident_time') is-invalid @enderror"
                                   id="incident_time"
                                   name="incident_time"
                                   placeholder="contoh: 5 - 20 Januari 20XX atau Selama bulan Desember di tahun 20XX"
                                   value="{{ old('incident_time') }}"
                                   required>
                            @error('incident_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="incident_chronology" class="form-label">Kronologis Kejadian</label>
                            <textarea class="form-control @error('incident_chronology') is-invalid @enderror"
                                      id="incident_chronology"
                                      name="incident_chronology"
                                      rows="4"
                                      placeholder="Ceritakan tentang detail kejadian di sini"
                                      required>{{ old('incident_chronology') }}</textarea>
                            @error('incident_chronology')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="evidence" class="form-label">Bukti</label>
                            <input type="file"
                                   class="form-control @error('evidence') is-invalid @enderror"
                                   id="evidence"
                                   name="evidence">
                            @error('evidence')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
