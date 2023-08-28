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
                                <p class="display-4 text-white mt-4"><?php echo e(getNameDept($loker->id_dept)); ?></p>

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
        <form action="<?php echo e(route('addloker.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="container">
                <div class="row">
                    <div class="container">
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <br>
                                <h3 style="color: #2e0e00">Data Pribadi</h3>
                            </div>
                            <div class="col-lg-9">
                                <br>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-control-label" for="validationCustom01">Nama
                                                    Lengkap</label>
                                                <input type="text" class="form-control" id="validationCustom01"
                                                    value="<?php echo e($user->name); ?>" placeholder="First name" disabled required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-control-label" for="validationCustom01">E-mail</label>
                                                <input type="email" class="form-control" id="validationCustom01"
                                                    placeholder="Alamat Email" value="<?php echo e($user->email); ?>" disabled
                                                    required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-control-label" for="validationCustom01">Nomor
                                                    Telephon / HP</label>
                                                <input type="text" class="form-control" id="validationCustom01"
                                                    placeholder="Nomor" value="<?php echo e($user->nomor); ?>" disabled required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($loker->gender === 1): ?>
                                            <label class="form-control-label" for="validationCustom01">Jenis Kelamin</label>
                                            <div class="row">
                                                <div class="custom-control custom-radio mb-3 ml-3">
                                                    <input class="custom-control-input" id="lakilaki" name="jenis_kelamin"
                                                        type="radio" value="laki-laki">
                                                    <label class="custom-control-label" for="lakilaki">Laki-laki</label>
                                                </div>
                                                <div class="custom-control custom-radio mb-3 ml-3">
                                                    <input class="custom-control-input" id="perempuan" name="jenis_kelamin"
                                                        type="radio" value="perempuan">
                                                    <label class="custom-control-label" for="perempuan">Perempuan</label>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($loker->date_birth === 1): ?>
                                            <label class="form-control-label" for="validationCustom01">Tempat, Tanggal
                                                Lahir</label>
                                            <input type="date" class="form-control mb-3" id="validationCustom01"
                                                placeholder="First name" required>
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-control-label" for="provinsi">Provinsi</label>
                                                    <select class="form-control" id="pro" name="provinsi"
                                                        data-toggle="select" required>
                                                        <option value="" disabled selected>Pilih Provinsi</option>
                                                        <?php $__currentLoopData = $provinsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>

                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-control-label" for="kota">kota</label>
                                                    <select class="form-control" id="kota" name="kota"
                                                        data-toggle="select" required>
                                                        
                                                        
                                                    </select>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-control-label" for="kecamatan">kecamatan</label>
                                                    <select class="form-control" id="kecamatan" name="kecamatan"
                                                        data-toggle="select" required>

                                                    </select>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($loker->profile_image === 1): ?>
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-control-label"
                                                        for="validationCustom01">Photo</label>
                                                    <input type="file" class="form-control" id="validationCustom01"
                                                        placeholder="First name" value="Mark" required>

                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($loker->resume === 1): ?>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                    <br>
                                    <h3 style="color: #2e0e00">CV atau Resume</h3>
                                </div>
                                <div class="col-lg-9">

                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <input type="file" class="form-control" id="validationCustom01"
                                                placeholder="First name" value="Mark" required>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($loker->cv === 1): ?>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                    <br>
                                    <h3 style="color: #2e0e00">Cover Letter</h3>
                                </div>
                                <div class="col-lg-9">

                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <textarea type="text" class="form-control" id="validationCustom01" placeholder="First name" required
                                                style="width: 100%; height: 200px;"></textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($loker->tac === 1): ?>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                    <br>
                                    <h3 style="color: #2e0e00">Syarat dan Ketentuan</h3>
                                </div>
                                <div class="col-lg-9">

                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <textarea type="text" class="form-control" id="validationCustom01" placeholder="First name" required
                                                style="width: 100%; height: 900px;">Syarat dan
                                        Ketentuan (“Syarat dan Ketentuan”) ini dan segala peraturan atau kebijakan lain yang
                                        tersedia pada aplikasi Sribuu merupakan perjanjian-perjanjian yang mengikat
                                        berdasarkan Hukum yang Berlaku antara Pengguna dan PT Maju Bersama Alia

                                        Kami mewajibkan Anda untuk membaca seluruh isi Perjanjian dan apabila Anda memiliki
                                        pertanyaan apapun mengenai Perjanjian, Anda dapat menghubungi Kami melalui
                                        admin@sribuu.id.

                                        1. Definisi
                                        “Afiliasi” berarti (i) pihak pengendali dari; (ii) anak perusahaan dari; atau (iii)
                                        pihak yang berada dalam satu pengendalian dengan PT Maju Bersama Alia.
                                        “Perjanjian” berarti Syarat dan Ketentuan ini, Kebijakan Privasi, dan segala
                                        peraturan atau kebijakan lain yang tersedia pada Aplikasi, termasuk semua syarat dan
                                        ketentuan, serta kebijakan tambahan atau modifikasi lain yang berkaitan dengan
                                        Aplikasi atau segala layanan yang tersedia saat ini atau yang mungkin ditawarkan
                                        oleh Sribuu di masa depan. Perjanjian ini dibuat sesuai dengan Ketentuan
                                        Undang-Undang No. 11 Tahun 2008 tentang Informasi dan Transaksi Elektronik
                                        sebagaimana telah diubah oleh Undang-Undang No. 19 Tahun 2016 tentang Perubahan atas
                                        Undang-Undnag Nomor 11 Tahun 2008 tentang Informasi dan Transaksi Elektronik, dan
                                        semua peraturan pelaksananya dan perubahannya. Perjanjian ini adalah bukti rekam
                                        secara elektronik yang dihasilkan oleh sistem komputer dan tidak memerlukan tanda
                                        tangan fisik atau digital.
                                        “Hukum yang Berlaku” berarti setiap perundangan, undang-undang, kitab undang-undang,
                                        hukum (termasuk common law dan keadilan), peraturan, aturan, ordonansi, perintah,
                                        surat keputusan, amar putusan, penetapan, putusan atau keputusan dari instansi
                                        pemerintah mana pun.
                                        “Aplikasi” berarti situs web Sribuu di https://www.sribuu.id, aplikasi seluler
                                        Sribuu yang dikembangkan oleh PT Maju Bersama Alia di platform Android dan iOS, dan
                                        situs lain yang telah resmi dikembangkan Sribuu untuk mendukung ekosistem Layanan.
                                        “Pin Otorisasi” berarti kode sandi yang Pengguna buat dengan tujuan untuk
                                        menggunakan dan menjalankan fitur-fitur tertentu secara terbatas pada Aplikasi.
                                        “Konten” berarti setiap dan/atau seluruh informasi yang dibuat dan/atau disusun
                                        dan/atau dikembangkan dan/atau dikelola oleh Pengguna, termasuk namun tidak terbatas
                                        pada teks atau tulisan, gambar, quotes atau kutipan, foto, ilustrasi, animasi,
                                        video, rekaman suara atau musik, judul, deskripsi dan/atau setiap data dalam bentuk
                                        apapun yang disediakan dan/atau diunggah oleh Pengguna ke dalam Aplikasi, termasuk
                                        setiap tautan yang menghubungkan kepadanya. Untuk menghindari keraguan, Konten
                                        mencakup pula setiap dan/atau seluruh informasi, data, berita aktual, tulisan,
                                        gambar, kutipan, foto, ilustrasi, animasi, video, rekaman suara, yang diperoleh
                                        Pengguna dari pihak ketiga, di mana Pengguna telah memiliki kewenangan untuk
                                        menggunakan dan mendistribusikan konten tersebut.
                                        “Undang-Undang Hak Cipta” berarti Undang-Undang Nomor 28 Tahun 2014 tentang Hak
                                        Cipta dan semua peraturan pelaksananya dan perubahannya.
                                        “Hak Kekayaan Intelektual” berarti paten, merek dagang, merek jasa atau layanan, hak
                                        cipta, hak pada desain, pengetahuan, atau hak kekayaan intelektual atau industri
                                        lainnya, baik terdaftar maupun tidak terdaftar;
                                        “OTP” berarti sistem kata sandi satu kali yang digunakan Pengguna untuk mendaftarkan
                                        diri pada Aplikasi.
                                        “Informasi Pribadi” berarti informasi mengenai Pengguna yang secara pribadi dapat
                                        diidentifikasi yang dikumpulkan melalui Aplikasi, seperti nama, alamat, tanggal
                                        lahir dan pekerjaan, nomor telepon, alamat surat elektronik (e-mail), perizinan
                                        dan/atau sejenisnya, dan informasi lain yang mungkin dapat mengidentifikasi Anda
                                        sebagai Pengguna Aplikasi.
                                        “Kebijakan Privasi” berarti kebijakan yang mengatur tentang cara Sribuu
                                        mengumpulkan, mengolah, menggunakan, dan mengungkapkan data dan informasi Pengguna
                                        dalam Aplikasi.
                                        “Layanan” memiliki arti sebagaimana dimaksud pada Pasal 2 Syarat dan Ketentuan ini.
                                        “Sribuu” atau “Kami” berarti PT Maju Bersama Alia, suatu perusahaan yang didirikan
                                        berdasarkan hukum Negara Republik Indonesia, dan/ atau Afiliasi-nya.
                                        “Anda” atau “Pengguna” berarti pihak yang terdaftar sebagai pelanggan Aplikasi untuk
                                        menggunakan Layanan yang disediakan di dalam Aplikasi.</textarea>

                                        </div>
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input class="custom-control-input" id="invalidCheck" type="checkbox"
                                                value="" required>
                                            <label class="custom-control-label" for="invalidCheck">Setuju dengan Syarat
                                                dan
                                                Ketentuan</label>
                                            <div class="invalid-feedback">
                                                You must agree before submitting.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
        </form>
        <div class="row justify-content-center d-flex">
            <button class="btn btn-primary">Simpan</button>
            <button class="btn btn-secondary">Cancel</button>
        </div>

        </div>

        </div>

        <br>
        <hr>

        </div>
    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.landinglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portal-hrd\resources\views/landing/lokerapply.blade.php ENDPATH**/ ?>