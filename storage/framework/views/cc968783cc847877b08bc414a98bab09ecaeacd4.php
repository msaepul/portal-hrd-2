

<?php $__env->startSection('title', 'Detail_Wo'); ?>

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-white pt-5 pb-7">
            <div class="container">
                <div class="container">
                    <div class="header-body">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="pr-5">
                                    <h1 class="display-2 text-white font-weight-bold mb-0">Nama PT</h1>
                                    <h2 class="display-4 text-white font-weight-light">A beautiful premium dashboard for
                                        Bootstrap 4.</h2>
                                    <p class="text-white mt-4">Argon perfectly combines reusable HTML and modular CSS with a
                                        modern styling and beautiful markup throughout each HTML template in the pack.</p>
                                    <div class="mt-5">
                                        <a href="./pages/dashboards/dashboard.html" class="btn btn-neutral my-2">Explore
                                            Dashboard</a>
                                        <a href="https://www.creative-tim.com/product/argon-dashboard-pro"
                                            class="btn btn-default my-2">Purchase now</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-brown" points="2560 0 2560 100 0 100"></polygon>
                </svg>
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
                                by: <?php echo e(getPTCabang($loker->id_cabang)); ?>

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
                            <a href="<?php echo e(route('applyloker', $loker->id)); ?>"
                                class="btn btn-primary btn-block mt-3 mb-5 mt-lg-0">Masukan
                                Lamaran</a>
                        </div>
                    </div>
                </div>

                <br>
                <hr>
                

            </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.landinglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portal-hrd\resources\views/loker/lokerlandingdetail.blade.php ENDPATH**/ ?>