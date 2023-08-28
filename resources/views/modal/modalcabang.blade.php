<div class="modal fade" id="modal-cabang" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-  modal-" role="document">
        <div class="modal-content">

            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white bold" id="modal-title-default">Masukan Data Cabang</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('masterdata.cabang.action') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-control-label" for="exampleFormControlInput1">Nama PT</label>
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                            </div>
                            <input class="form-control" name="pt" id="pt" placeholder="PT ADONAI ALFA OMEGA"
                                value="{{ old('pt') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="exampleFormControlInput1">ALAMAT</label>
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                            </div>
                            <textarea class="form-control" placeholder="Alamat Lengkap" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="form-control-label" for="exampleFormControlInput1">Nama Cabang</label>
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                                </div>
                                <input class="form-control" name="keterangan" id="keterangan" placeholder="Padalarang"
                                    value="{{ old('keterangan') }}">
                                <input type="hidden" name="status" id="status" value="1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-control-label" for="exampleFormControlInput1">Singkatan</label>
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                                </div>
                                <input class="form-control" name="nama_cabang" id="nama_cabang" placeholder="PDL"
                                    value="{{ old('nama_cabang') }}">
                            </div>
                        </div>
                    </div>


            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>
