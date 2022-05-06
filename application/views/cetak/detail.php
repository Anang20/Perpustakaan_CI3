<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="<?= base_url('cetak'); ?>" class="btn btn-sm btn-secondary shadow-sm"><i class="fas fa-id-card"></i> Tabel Anggota</a>
            <a href="<?= base_url('cetak'); ?>" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-id-card"></i> Download Kartu</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-dark">
                <div class="row">
                    <div class="col-8 mx-auto border rounded">
                        <div class="row">
                            <div class="col-2">
                                <img src="<?= base_url('assets/'); ?>img/about-img.jpg" class="rounded mx-auto d-block m-2" alt="logo" style="width: 100%;">
                            </div>
                            <div class="col-10 text-center mt-4">
                                <h5><b>Kartu Anggota E-Perpus</b></h5>
                                <small>Sebagai tanda anggota perpustakaan yang digunakan untuk meminjam buku</small>
                            </div>
                        </div>
                        <hr class="mt-1">
                        <div class="row">
                            <div class="col-3">
                                <img src="<?= base_url('assets/'); ?>img/foto/<?= $data['foto'] ?>" class="rounded mx-auto d-block m-2" alt="logo" style="width: 100%;">
                            </div>
                            <div class="col-9 mt-1">
                                <!-- Nama Anggota -->
                                <p>Nama Anggota : <?= $data["nama_anggota"] ?> </p>
                                <p>Alamat : <?= $data["alamat"] ?></p>
                                <p>Jenis Kelamin : <?= $data["jenis_kelamin"] ?></p>
                                <p>Nomor Handphone : <?= $data["no_hp"] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-8 mt-1 mb-1">
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