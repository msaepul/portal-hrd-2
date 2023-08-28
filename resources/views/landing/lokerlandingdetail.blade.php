@extends('layout.landinglayout')

@section('title', 'Detail_Wo')

@section('content')
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-white pt-5 pb-7">
            <div class="container">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="pr-5 header-text">
                                <div class="mt-7">
                                </div>
                                <!-- Tambahkan class "header-text" pada elemen yang ingin diberikan efek transparan -->
                                <h1 class="display-2 text-white font-weight-bold mb-0">
                                    {{ getPTCabang($loker->id_cabang) }}
                                </h1>
                                <h2 class="display-4 text-white font-weight-light">
                                    {{ getAlamatCabang($loker->id_cabang) }}
                                </h2>
                                <p class="text-white mt-4">Jordan Bakery selalu berupaya Mengusahakan kesejahteraan
                                    karyawan dan memberkati lingkungan di manapun berada..</p>

                                <div class="mt-7">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="py-100 section-nucleo-icons bg-white overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <br>
                            <h4 class="display-4" style="color: #2e0e00">{{ getNameDept($loker->id_dept) }}</h4>
                            <p class="text-muted text-capitalize">
                                Lokasi: {{ getPTCabang($loker->id_cabang) }}
                            </p>
                            <p class="display-5" style="color: #2e0e00; font-weight: bold;">
                                Skills
                            </p>
                            @forelse ($loker->id_skill as $skill)
                                <span class="badge badge-pill badge-primary">{{ getNameSkill($skill) }}</span>
                            @empty
                                -
                            @endforelse
                            <br> <br>
                            <h4 class="display-4" style="color: #2e0e00">Deskripsi Pekerjaan</h4>

                            <p class="">{!! $loker->desc_job !!}</p>
                            <br> <br>
                            <h4 class="display-4" style="color: #2e0e00">Persyaratan</h4>

                            <p class="">{!! $loker->require_job !!}</p>
                        </div>
                        <div class="col-lg-3">
                            <br>
                            <a href="{{ Auth::check() ? route('applyloker', $loker->id) : '#' }}"
                                class="btn btn-primary btn-block mt-3 mb-5 mt-lg-0"
                                onclick="{{ Auth::check() ? '' : 'showLoginAlert()' }}">
                                Masukkan Lamaran
                            </a>


                        </div>
                    </div>
                </div>

                <br>
                <hr>
                {{-- <div class="row">
                        @foreach ($loker as $l)
                            <div class="col-lg-6">
                                <div class="card card-lift--hover shadow border-0" id="{{ getNameCabang($l->id_cabang) }}">
                                    <a href="{{ route('landingloker', ['id' => $l->id]) }}" class="card-body py-5"
                                        style="display: block; text-decoration: none;">
                                        <div class="icon icon-shape bg-gradient-primary text-white rounded-circle mb-4">
                                            <i class="ni ni-check-bold"></i>
                                        </div>
                                        <h4 class="h3 text-primary text-uppercase">{{ getPTCabang($l->id_cabang) }}</h4>
                                        <p class="description mt-3">
                                            {!! custom_str_limit($l->desc_job) !!}
                                        </p>

                                        <div>
                                            @foreach ($l->id_skill as $idSkill)
                                                <span
                                                    class="badge badge-pill badge-primary">{{ getNameSkill($idSkill) }}</span>
                                            @endforeach


                                        </div>
                                    </a>
                                </div>

                            </div>
                        @endforeach
                    </div> --}}

            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script>
        function showLoginAlert() {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Anda harus daftar terlebih dahulu untuk melamar pekerjaan.',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('register') }}";
                }
            });
        }
    </script>

@endsection
