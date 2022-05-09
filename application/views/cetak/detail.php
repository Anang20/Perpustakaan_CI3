<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="<?= base_url('cetak'); ?>" class="btn btn-sm btn-secondary shadow-sm"><i class="fas fa-id-card"></i> Tabel Anggota</a>
            </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-dark">
                <div class="row">
                    <div class="col-8 mx-auto rounded" style="background-image: url('<?= base_url("assets/") ?>img/background-card.jpg'); background-repeat: no-repeat;">
                        <div class="row">
                            <div class="col-3">
                                <img src="<?= base_url('assets/'); ?>img/logo-epus.png" class="rounded mx-auto d-block m-2" alt="logo" style="width: 95px;">
                            </div>
                            <div class="col-9 text-center mt-4">
                                <h5 class="text-white"><b>Kartu Anggota E-Perpus</b></h5>
                                <small class="text-white">Sebagai tanda anggota perpustakaan yang digunakan untuk meminjam buku</small>
                            </div>
                        </div>
                        <!-- <hr class="mt-1"> -->
                        <div class="container">
                            <div class="row mt-3">
                                <div class="col-3">
                                    <img src="<?= base_url('assets/'); ?>img/foto/<?php echo $data["foto"] ?>" class="rounded mx-auto d-block m-2" alt="logo" style="width: 100%;">
                                </div>
                                <div class="col-9 mt-1">
                                    <!-- Nama Anggota -->
                                    <p style="margin-left: 30px;" > <b> Nama Anggota : <?= $data["nama_anggota"] ?>  </b> </p>
                                    <p style="margin-left: 30px;" > <b> Alamat : <?= $data["alamat"] ?> </b> </p>
                                    <p style="margin-left: 30px;" > <b> Jenis Kelamin : <?= $data["jenis_kelamin"] ?> </b> </p>
                                    <p style="margin-left: 30px;" > <b> Nomor Handphone : <?= $data["no_hp"] ?> </b> </p>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 42px;">
                            <div class="col-8 mt-1 text-white">
                                <p class="">Kode Anggota : <b><?= $data["kode_anggota"] ?></b></b></p>
                            </div>
                            <div class="col-4">
                                <span>
                                    <?php 
                                        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                        echo $generator->getBarcode($data["kode_anggota"], $generator::TYPE_CODE_128);
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>