<?php $__env->startSection('title', 'Detail_Wo'); ?>

<?php $__env->startSection('content'); ?>
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
                    <?php if($errors->has('departemen')): ?>
                        <div id="errorDepartemen" class="alert alert-danger">
                            <?php echo e($errors->first('departemen')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if($errors->has('catatan')): ?>
                        <div id="errorCatatan" class="alert alert-danger">
                            <?php echo e($errors->first('catatan')); ?>

                        </div>
                    <?php endif; ?>

                    <!-- Card header -->
                    <div class="card-header">
                        
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i
                                class="fas fa-plus-circle"></i> Tambah</button>
                        <button class="btn btn-warning"><i class="fas fa-plus-circle"></i> Loker</button>
                        <?php echo $__env->make('modal.modaldept', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Departemen</th>
                                    <th>Banyaknya Karyawan</th>
                                    <th>Karyawan yang dibutuhkan</th>
                                    <th>Catatan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($index + 1); ?></td>
                                        <td><?php echo e($dept->departemen); ?></td>
                                        <td>20</td>
                                        <td>20</td>
                                        <td><?php echo e($dept->catatan); ?></td>
                                        <td>
                                            <?php if($dept->status == 1): ?>
                                                <span class="badge badge-success">Aktif</span>
                                            <?php else: ?>
                                                <span class="badge badge-warning">Tidak aktif</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('Departemen.updateStatus', ['id' => $dept->id, 'model' => 'Departemen'])); ?>"
                                                class="btn btn-sm btn-warning"> <i class="fas fa-ban"
                                                    style="color: #ffffff;"></i>
                                            </a>


                                            <!-- Form untuk menghapus data loker -->
                                            
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"
                                                    style="color: #ffffff;"></i></button>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portal-hrd\resources\views/masterdata/departemen.blade.php ENDPATH**/ ?>