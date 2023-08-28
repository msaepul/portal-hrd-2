@extends('layout.mainlayout')

@section('title', 'Detail_Wo')

@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Lowonga Kerja</h6>
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
                    {{-- @if ($errors->has('departemen'))
                        <div id="errorDepartemen" class="alert alert-danger">
                            {{ $errors->first('departemen') }}
                        </div>
                    @endif

                    @if ($errors->has('catatan'))
                        <div id="errorCatatan" class="alert alert-danger">
                            {{ $errors->first('catatan') }}
                        </div>
                    @endif

                    <!-- Jika ada pesan sukses -->
                    @if (session('success'))
                        <div id="successMessage" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif --}}

                    <!-- Card header -->
                    {{-- <div class="card-header">
                        <a href="{{ route('addloker') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                            Tambah</a>
                    </div> --}}


                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>ID Loker</th>
                                    <th>Nama User</th>
                                    <th>TTL</th>
                                    <th>Resume</th>
                                    <th>CV</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>No</td>
                                    <td>ID Loker</td>
                                    <td>Nama User</td>
                                    <td>TTL</td>
                                    <td>Resume</td>
                                    <td>CV</td>
                                    <td>status</td>
                                    <td>Action</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

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
        <script>
            // Fungsi untuk menghilangkan pesan sukses setelah 5 detik
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 3000); // Waktu dalam milidetik (5000 ms = 5 detik)
        </script>
    @endsection
