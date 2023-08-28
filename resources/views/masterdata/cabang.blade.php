@extends('layout.mainlayout')

@section('title', 'Master Data Cabang')

@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Datatables</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Datatables</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral">New</a>
                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Jika ada pesan error untuk departemen -->
                    @if ($errors->has('departemen'))
                        <div id="errorDepartemen" class="alert alert-danger">
                            {{ $errors->first('departemen') }}
                        </div>
                    @endif

                    @if ($errors->has('catatan'))
                        <div id="errorCatatan" class="alert alert-danger">
                            {{ $errors->first('catatan') }}
                        </div>
                    @endif

                    <!-- Card header -->
                    <div class="card-header">
                        {{-- <h3 class="mb-0">List Departemen</h3>
              <p class="text-sm mb-0">
            Masukan data departemen
              </p> --}}
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-cabang"><i
                                class="fas fa-plus-circle"></i> Tambah</button>

                        @include('modal.modalcabang')
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama PT</th>
                                    <th>Lokasi</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>Singkatan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cabang as $index => $cab)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $cab->pt }}</td>
                                        <td>{{ $cab->keterangan }}</td>
                                        <td>{{ $cab->alamat }}</td>
                                        <td>{{ $cab->nama_cabang }}</td>
                                        <td>
                                            @if ($cab->status == 1)
                                                <span class="badge badge-success">Aktif</span>
                                            @else
                                                <span class="badge badge-warning">Tidak aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('Cabang.updateStatus', ['id' => $cab->id, 'model' => 'Cabang']) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-ban" style="color: #ffffff;"></i>
                                            </a>
                                            <!-- Form untuk menghapus data loker -->
                                            <form action="{{ route('masterdata.cabang.delete', $cab->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"
                                                        style="color: #ffffff;"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Script untuk mengatur auto-hide pada semua div alert -->
        <script>
            // Fungsi untuk auto-hide div alert dengan ID tertentu setelah beberapa detik (misalnya 5 detik)
            function autoHideAlert(alertId) {
                var alertElement = document.getElementById(alertId);
                if (alertElement) {
                    setTimeout(function() {
                        alertElement.style.display = "none"; // Sembunyikan elemen alert
                    }, 3000); // 5000 milidetik (5 detik)
                }
            }

            // Panggil fungsi autoHideAlerts ketika halaman dimuat
            document.addEventListener("DOMContentLoaded", function() {
                autoHideAlert('errorDepartemen');
                autoHideAlert('errorCatatan');
            });
        </script>

    @endsection
