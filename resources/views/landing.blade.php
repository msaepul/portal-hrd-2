@extends('layout.landinglayout')

@section('title', 'Detail_Wo')

@section('content')
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-white pt-5 pb-7">
            <div class="container">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="pr-5 header-text">
                                <!-- Tambahkan class "header-text" pada elemen yang ingin diberikan efek transparan -->
                                <div class="mt-7">

                                </div>
                                @if (Auth::check())
                                    <h1 class="display-2 text-white font-weight-bold mb-0">SELAMAT DATANG
                                        {{ Auth::user()->name }}!!
                                    @else
                                        <h1 class="display-2 text-white font-weight-bold mb-0">SELAMAT DATANG!!
                                @endif

                                </h1>
                                <h2 class="display-4 text-white font-weight-light">Silahkan lihat lowongan kerja yang
                                    tersedia.</h2>
                                <p class="text-white mt-4">Jordan Bakery selalu berupaya Mengusahakan kesejahteraan
                                    karyawan dan memberkati lingkungan di manapun berada.

                                    .</p>
                                <div class="mt-7">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="py-7 section-nucleo-icons bg-white overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <br>
                    <h2 class="display-3" style="color: #2e0e00">Pilih Lokasi Cabang Perusahaan</h2>
                    <p class="lead">
                    <div class="row d-flex justify-content-between">
                        <div class="row"></div>
                        @foreach ($cabang as $cab)
                            <div class="col">
                                <button class="btn btn-outline-warning btn-block btn-oval btn-md"
                                    data-target="{{ $cab->keterangan }}">{{ $cab->keterangan }}</button>
                            </div>
                        @endforeach
                        </p>

                    </div>
                    <br>
                    <div class="row">
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
                    </div>

                </div>
    </section>
@endsection
