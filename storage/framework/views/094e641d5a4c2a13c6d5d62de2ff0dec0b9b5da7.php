<?php $__env->startSection('title', 'Detail_Wo'); ?>

<?php $__env->startSection('content'); ?>
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
                                    <?php echo e(getPTCabang($loker->id_cabang)); ?>

                                </h1>
                                <h2 class="display-4 text-white font-weight-light">
                                    <?php echo e(getAlamatCabang($loker->id_cabang)); ?>

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
                            <h4 class="display-4" style="color: #2e0e00"><?php echo e(getNameDept($loker->id_dept)); ?></h4>
                            <p class="text-muted text-capitalize">
                                Lokasi: <?php echo e(getPTCabang($loker->id_cabang)); ?>

                            </p>
                            <p class="display-5" style="color: #2e0e00; font-weight: bold;">
                                Skills
                            </p>
                            <?php $__empty_1 = true; $__currentLoopData = $loker->id_skill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <span class="badge badge-pill badge-primary"><?php echo e(getNameSkill($skill)); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                -
                            <?php endif; ?>
                            <br> <br>
                            <h4 class="display-4" style="color: #2e0e00">Deskripsi Pekerjaan</h4>

                            <p class=""><?php echo $loker->desc_job; ?></p>
                            <br> <br>
                            <h4 class="display-4" style="color: #2e0e00">Persyaratan</h4>

                            <p class=""><?php echo $loker->require_job; ?></p>
                        </div>
                        <div class="col-lg-3">
                            <br>
                            <a href="<?php echo e(Auth::check() ? route('applyloker', $loker->id) : '#'); ?>"
                                class="btn btn-primary btn-block mt-3 mb-5 mt-lg-0"
                                onclick="<?php echo e(Auth::check() ? '' : 'showLoginAlert()'); ?>">
                                Masukkan Lamaran
                            </a>


                        </div>
                    </div>
                </div>

                <br>
                <hr>
                

            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="<?php echo e(asset('vendor/sweetalert/sweetalert.all.js')); ?>"></script>
    <script>
        function showLoginAlert() {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Anda harus daftar terlebih dahulu untuk melamar pekerjaan.',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?php echo e(route('register')); ?>";
                }
            });
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.landinglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portal-hrd\resources\views/landing/lokerlandingdetail.blade.php ENDPATH**/ ?>