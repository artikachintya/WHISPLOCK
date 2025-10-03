<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Whisplock | Admin</title>

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <span class="brand-text font-weight-light">Whisplock</span>
                </a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-user-circle fa-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <h1 class="m-0 text-dark">Daftar Pengaduan</h1>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Pengaduan</h3>
                        </div>
                        <div class="card-body">
                            <table id="reportsTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Terlapor</th>
                                        <th>Waktu Kejadian</th>
                                        <th>Kronologis</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports as $report)
                                        <tr>
                                            <td>{{ $report->id }}</td>
                                            <td>{{ $report->reported_person_name }}</td>
                                            <td>{{ $report->incident_time }}</td>
                                            <td>{{ $report->incident_chronology }}</td>
                                            <td>
                                                @if ($report->evidence)
                                                    <img src="{{ asset('storage/evidence/' . $report->evidence) }}"
                                                        alt="Bukti" class="img-thumbnail"
                                                        style="max-width: 120px; max-height: 120px;">
                                                @else
                                                    <span class="text-muted">Tidak ada bukti</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($report->status == 1)
                                                    <span class="badge badge-success">Selesai</span>
                                                @elseif ($report->status == 0)
                                                    <span class="badge badge-warning">Dalam Proses</span>
                                                @elseif ($report->status == -1)
                                                    <span class="badge badge-secondary">Menunggu</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-info" data-toggle="modal"
                                                    data-target="#updateStatusModal{{ $report->id }}">
                                                    Perbarui Status
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal Update Status -->
                                        <div class="modal fade" id="updateStatusModal{{ $report->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form method="POST" action="{{ route('admin.update', $report->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Perbarui Status</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="response">Catatan</label>
                                                                <textarea name="response" class="form-control" rows="3">{{ old('response', $report->response) }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Status Baru</label>
                                                                <select name="new_status" class="form-control">
                                                                    <option value="-1"
                                                                        {{ $report->status == -1 ? 'selected' : '' }}>
                                                                        Menunggu</option>
                                                                    <option value="0"
                                                                        {{ $report->status == 0 ? 'selected' : '' }}>
                                                                        Dalam Proses</option>
                                                                    <option value="1"
                                                                        {{ $report->status == 1 ? 'selected' : '' }}>
                                                                        Selesai</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <script>
        $(function() {
            $('#reportsTable').DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
            });
        });
    </script>
</body>

</html>
