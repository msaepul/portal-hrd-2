<div class="modal fade" id="modal-skill" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-  modal-" role="document">
        <div class="modal-content">

            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white bold" id="modal-title-default">Masukan Data Skills</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('masterdata.skill.action') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-control-label" for="exampleFormControlInput1">skill</label>
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                            </div>

                            <input class="form-control" name="nama_skill" id="nama_skill"
                                placeholder="Masukan Nama Skill">

                            <input type="hidden" name="status" id="status" value="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="exampleFormControlInput1">Catatan</label>
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                            </div>
                            <textarea class="form-control" placeholder="Catatan" name="catatan" id="catatan"></textarea>
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
