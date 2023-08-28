@extends('layout.mainlayout')

@section('title', 'Edit-loker')

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
    <form action="{{ route('loker.edit.action', $loker->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Page content -->
        <div class="container-fluid mt--6 d-flex justify-content-center align-items-center">
            <div class="card d-flex col-lg-10 mb-2">
                <!-- Card header -->
                <div class="card-header">
                    <h2 class="mb-0">
                        <center>Edit Form Lowongan Pekerjaan <center>
                    </h2>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <!-- Form groups used in grid -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Cabang</label>
                                <input type="text" class="form-control" id="example3cols1Input" placeholder="Cabang"
                                    name="id_cabang2" id="id_cabang" value="{{ getPTCabang($loker->id_cabang) }}" readonly>
                                <input type="hidden" name="id_cabang" value="{{ auth()->user()->id_cabang }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols3Input">Departemen</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="id_dept" id="id_dept">
                                    @foreach ($depts as $d)
                                        <option value="{{ $d->id }}"
                                            @if ($d->id === $loker->id_dept) selected @endif>
                                            {{ $d->departemen }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="example2cols2Input">Deskripsi Pekerjaan</label>
                                <div data-toggle="quill" data-quill-placeholder="Quill WYSIWYG" name="quill1">
                                    {!! $loker->desc_job !!}
                                    <!-- Tampilkan deskripsi pekerjaan dari data yang ingin diedit -->
                                </div>
                                <input type="hidden" name="quill_content1" id="quillContent1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="example2cols2Input">Deskripsi Pekerjaan</label>
                                <div data-toggle="quill" data-quill-placeholder="Quill WYSIWYG" name="quill2">
                                    {!! $loker->require_job !!}
                                    <!-- Tampilkan deskripsi pekerjaan dari data yang ingin diedit -->
                                </div>
                                <input type="hidden" name="quill_content2" id="quillContent2">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <!-- Input untuk Start Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Start Date</label>
                                <input type="date" name="start_date" class="form-control" id="example3cols1Input"
                                    value="{{ $loker->start_date }}">
                                <!-- Isi dengan nilai awal dari data yang ingin diedit -->
                            </div>
                        </div>
                        <!-- Input untuk End Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols2Input">End Date</label>
                                <input type="date" name="end_date" class="form-control" id="example3cols2Input"
                                    value="{{ $loker->end_date }}">
                                <!-- Isi dengan nilai awal dari data yang ingin diedit -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Ask Application For</label>
                                <div class="row">
                                    <div class="custom-control custom-checkbox mb-3 ml-3">
                                        <input class="custom-control-input" id="gender" name="gender"
                                            type="checkbox" value="1"
                                            @if ($loker->gender == 1) checked @endif>
                                        <!-- Tandai checkbox jika data gender bernilai 1 -->
                                        <label class="custom-control-label" for="gender">Gender</label>
                                    </div>

                                    <!-- Checkbox untuk Date Of Birth -->
                                    <div class="custom-control custom-checkbox mb-3 ml-3">
                                        <input class="custom-control-input" id="date_birth" name="date_birth"
                                            type="checkbox" value="1"
                                            @if ($loker->date_birth == 1) checked @endif>
                                        <!-- Tandai checkbox jika data date_birth bernilai 1 -->
                                        <label class="custom-control-label" for="date_birth">Date Of Birth</label>
                                    </div>

                                    <!-- Checkbox untuk Country -->
                                    <div class="custom-control custom-checkbox mb-3 ml-3">
                                        <input class="custom-control-input" id="country" name="country"
                                            type="checkbox" value="1"
                                            @if ($loker->country == 1) checked @endif>
                                        <!-- Tandai checkbox jika data country bernilai 1 -->
                                        <label class="custom-control-label" for="country">Country</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Section Visibility</label>
                                <div class="row">
                                    <!-- Checkbox untuk Profile Image -->
                                    <div class="custom-control custom-checkbox mb-3 ml-3">
                                        <input class="custom-control-input" id="profile_image" name="profile_image"
                                            type="checkbox" value="1"
                                            @if ($loker->profile_image == 1) checked @endif>
                                        <!-- Tandai checkbox jika data profile_image bernilai 1 -->
                                        <label class="custom-control-label" for="profile_image">Profile Image</label>
                                    </div>

                                    <!-- Checkbox untuk Resume -->
                                    <div class="custom-control custom-checkbox mb-3 ml-3">
                                        <input class="custom-control-input" id="resume" name="resume"
                                            type="checkbox" value="1"
                                            @if ($loker->resume == 1) checked @endif>
                                        <!-- Tandai checkbox jika data resume bernilai 1 -->
                                        <label class="custom-control-label" for="resume">Resume</label>
                                    </div>

                                    <!-- Checkbox untuk Cover Letter -->
                                    <div class="custom-control custom-checkbox mb-3 ml-3">
                                        <input class="custom-control-input" id="cv" name="cv"
                                            type="checkbox" value="1"
                                            @if ($loker->cv == 1) checked @endif>
                                        <!-- Tandai checkbox jika data cv bernilai 1 -->
                                        <label class="custom-control-label" for="cv">Cover Letter</label>
                                    </div>

                                    <!-- Checkbox untuk Terms and Conditions -->
                                    <div class="custom-control custom-checkbox mb-3 ml-3">
                                        <input class="custom-control-input" id="tac" name="tac"
                                            type="checkbox" value="1"
                                            @if ($loker->tac == 1) checked @endif>
                                        <!-- Tandai checkbox jika data tac bernilai 1 -->
                                        <label class="custom-control-label" for="tac">Terms and Conditions</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>

                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </form>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill1 = new Quill('[name="quill1"]', {
                theme: 'snow'
            });
            var quill2 = new Quill('[name="quill2"]', {
                theme: 'snow'
            });

            // Mengisi nilai input tersembunyi saat teks di editor berubah
            quill1.on('text-change', function() {
                var quillContent1 = quill1.root.innerHTML;
                document.getElementById('quillContent1').value = quillContent1;
            });

            quill2.on('text-change', function() {
                var quillContent2 = quill2.root.innerHTML;
                document.getElementById('quillContent2').value = quillContent2;
            });

            // Mengisi editor dengan data awal saat dokumen selesai dimuat
            var initialContent1 = '{!! $loker->desc_job !!}';
            var initialContent2 = '{!! $loker->require_job !!}';
            quill1.clipboard.dangerouslyPasteHTML(initialContent1);
            quill2.clipboard.dangerouslyPasteHTML(initialContent2);
        });
    </script>
    <script>
        // Set nilai 1 saat checkbox diaktifkan (checked) dan nilai 0 saat dinonaktifkan (unchecked)
        $(document).ready(function() {
            $('input[type="checkbox"]').on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).val('1');
                } else {
                    $(this).val('0');
                }
            });
        });
    </script>

@endsection
