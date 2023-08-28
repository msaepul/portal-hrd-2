<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-  modal-" role="document">
        <div class="modal-content">

            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white bold" id="modal-title-default">Masukan Data Departemen</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('masterdata.dept.action')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label class="form-control-label" for="exampleFormControlInput1">Departemen</label>
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                            </div>

                            <input class="form-control" name="departemen" id="departemen">
                            <input type="hidden" name="status" id="status" value="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="exampleFormControlInput1">Catatan</label>
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                            </div>
                            <textarea class="form-control" placeholder="Catatan" name="catatan" id="catatan"> </textarea>
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
<?php /**PATH C:\xampp\htdocs\portal-hrd\resources\views/modal/modaldept.blade.php ENDPATH**/ ?>