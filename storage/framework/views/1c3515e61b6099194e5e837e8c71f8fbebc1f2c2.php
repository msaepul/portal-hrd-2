<?php $__env->startSection('title', 'Detail_Wo'); ?>

<?php $__env->startSection('content'); ?>
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
                                <?php if(Auth::check()): ?>
                                    <h1 class="display-2 text-white font-weight-bold mb-0">SELAMAT DATANG
                                        <?php echo e(Auth::user()->name); ?>!!
                                    <?php else: ?>
                                        <h1 class="display-2 text-white font-weight-bold mb-0">SELAMAT DATANG!!
                                <?php endif; ?>

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
                        <?php $__currentLoopData = $cabang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col">
                                <button class="btn btn-outline-warning btn-block btn-oval btn-md"
                                    data-target="<?php echo e($cab->keterangan); ?>"><?php echo e($cab->keterangan); ?></button>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p>

                    </div>
                    <br>
                    <div class="row">
                        <?php $__currentLoopData = $loker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6">
                                <div class="card card-lift--hover shadow border-0" id="<?php echo e(getNameCabang($l->id_cabang)); ?>">
                                    <a href="<?php echo e(route('landingloker', ['id' => $l->id])); ?>" class="card-body py-5"
                                        style="display: block; text-decoration: none;">
                                        <div class="icon icon-shape bg-gradient-primary text-white rounded-circle mb-4">
                                            <i class="ni ni-check-bold"></i>
                                        </div>
                                        <h4 class="h3 text-primary text-uppercase"><?php echo e(getPTCabang($l->id_cabang)); ?></h4>
                                        <p class="description mt-3">
                                            <?php echo custom_str_limit($l->desc_job); ?>

                                        </p>

                                        <div>
                                            <?php $__currentLoopData = $l->id_skill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idSkill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span
                                                    class="badge badge-pill badge-primary"><?php echo e(getNameSkill($idSkill)); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </div>
                                    </a>
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.landinglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portal-hrd\resources\views/landing.blade.php ENDPATH**/ ?>