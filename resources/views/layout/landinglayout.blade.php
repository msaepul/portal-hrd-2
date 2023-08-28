<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Argon Dashboard PRO - Premium Bootstrap 4 Admin Template
    </title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.1.0') }}" type="text/css">

    <!-- Custom CSS for Background Image -->
    {{-- <style>
    .main-content {
      background-image: url('./assets/img/brand/pdl.jpg'); /* Ganti 'path/to/background-image.jpg' dengan jalur gambar yang sesuai */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      padding: 80px 0; /* Atur padding sesuai kebutuhan */
    }
  </style> --}}
</head>
<style>
    /* Gaya khusus untuk elemen nav dengan ID navbar-main */
    #navbar-main.navbar {
        background-color: transparent;
        /* Atur latar belakang menjadi transparan */
    }

    .header {
        background-image: url('{{ asset('assets/img/brand/pdl.jpg') }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center bottom;
        /* Pindahkan background image ke bawah */
        padding-top: 5rem;
        padding-bottom: 7rem;
    }


    .fill-brown {
        fill: #8249109c;
        /* Gunakan kode warna cokelat (#964B00) */
    }

    .header-body {
        position: relative;
        /* Membuat posisi elemen menjadi relatif untuk mempengaruhi child element */
    }

    .header-text {
        background-color: rgba(0, 0, 0, 0.633);
        /* Warna latar belakang dengan opasitas */
        padding: 10px;
        /* Menambahkan ruang di sekitar teks */
        border-radius: 5px;
        /* Mengatur tingkat kebulatan sudut */
    }

    .header-text h1,
    .header-text h2,
    .header-text p {
        color: #ffffff;
        /* Warna teks menjadi putih */
    }
</style>
@php
    use Illuminate\Support\Str;
@endphp

<body>
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-main navbar-expand-lg navbar-dark bg-transparent">
        <div class="container d-flex align-items-center">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/brand/logo jordan.png') }}" style="width:15%; height:auto;">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        @guest
                            <a class="nav-link" href="{{ route('login') }}" class="btn btn-primary">
                                <i class="fas fa-sign-in-alt mr-2" style="color: #2e0e00;"></i>
                                <span style="color: rgba(47, 25, 4, 0.837);">Login</span>
                            </a>
                        @else
                        @endguest
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="fas fa-bars" style="color: #2e0e00;"></span>
            </button>
        </div>
    </nav>



    <!-- Main content -->
    @yield('content')

    <!-- Footer -->
    <footer class="py-5" id="footer-main">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2019 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                            target="_blank">Creative Tim</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Argon Scripts -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

    <!-- Core -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <!-- Page plugins -->
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.js?v=1.1.0') }}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ asset('assets/js/demo.min.js') }}"></script>

    <!-- Tautkan Bootstrap JS dan Popper.js untuk beberapa komponen Bootstrap yang membutuhkan JavaScript -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#pro').on('change', function() {
                let id_provinsi = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkota') }}",
                    data: {
                        id_provinsi: id_provinsi
                    },
                    cache: false,
                    success: function(response) {
                        // Lakukan sesuatu dengan data response
                        // Contoh: Mengisi data ke dalam elemen dengan ID "kota"
                        $('#kota').html(response);
                        $('#kecamatan').html('');

                    },
                    error: function(data) {
                        console.log('error', data);
                    },
                });
            });

            $('#kota').on('change', function() {
                let id_kota = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkecamatan') }}",
                    data: {
                        id_kota: id_kota
                    },
                    cache: false,
                    success: function(response) {
                        // Lakukan sesuatu dengan data response
                        // Contoh: Mengisi data ke dalam elemen dengan ID "kota"
                        $('#kecamatan').html(response);
                    },
                    error: function(data) {
                        console.log('error', data);
                    },
                });
            });
        });
    </script>

    <script>
        // Fungsi untuk menampilkan div card yang sesuai ketika tombol diklik
        function showCard(targetId) {
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                if (card.id === targetId) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Tambahkan event listener untuk tombol-tombol yang memiliki atribut data-target
        const buttons = document.querySelectorAll('[data-target]');
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                showCard(targetId);
            });
        });

        // Tampilkan card pertama secara default
        showCard('PADALARANG');
    </script>


</body>

</html>
