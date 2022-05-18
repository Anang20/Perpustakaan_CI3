<style>
    .kartu {
        font-family: 'sans-serif';
        background-image: url('<?= base_url("assets/") ?>img/background-card.jpg');
        display: grid;
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        border-radius: 3%;
        grid-template-rows: repeat(3, auto);
    }

    .header {
        display: grid;
        grid-template-columns: repeat(2, 22%);
    }

    .header img{
        margin-left: 40px;
    }

    .judul {
        margin-top: -20px;
        text-align: center;
        color: #ffff;
        font-size: 20px;
    }

    .content {
        display: grid;
        grid-template-columns: repeat(3, 22%);
    }

    .foto {
        border-radius: 10px;
        margin-left: 30px;
        margin-top: -60;
        width: 150px;
        height: 150px;
    }

    .identitas table {
        margin-top: -60px;
    }

    .footer {
        display: grid;
        grid-template-columns: repeat(2, 40%);
    }


</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="<?= base_url('cetak'); ?>" class="btn btn-sm btn-secondary shadow-sm"><i class="fas fa-id-card"></i> Tabel Anggota</a>
        </div>
    </div>

    <div class="container kartu">
        <div class="header">
            <div>
                <img src="<?= base_url('assets/'); ?>img/logo-epus.png" class="rounded mx-auto" alt="logo" style="width: 95px;">
            </div>
            <div class="judul">
                <h5 class="text-white"><b>Kartu Anggota E-Perpus</b></h5>
                <small class="text-white">Sebagai tanda anggota perpustakaan yang digunakan untuk meminjam buku</small>
            </div>
        </div>
        <!-- <hr class="mt-1"> -->
            <div class="container content">
                    <div>
                        <img src="<?= base_url('assets/'); ?>img/foto/<?php echo $data["foto"] ?>" class="foto" alt="logo">
                    </div>
                    <div class="identitas">
                        <table>
                            <thead>
                                <tr>
                                    <td>Nama Anggota</td>
                                    <td>:</td>
                                    <td><?= $data["nama_anggota"] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $data["alamat"] ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?= $data["jenis_kelamin"] ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Handphone</td>
                                    <td>:</td>
                                    <td><?= $data["no_hp"] ?></td>
                                </tr>
                            </thead>
                        </table>
                        <!-- Nama Anggota -->
                    </div>
            </div>
                <div class="footer">
                    <div class="kode">
                        <p class="">Kode Anggota : <b><?= $data["kode_anggota"] ?></b></b></p>
                    </div>
                    <div class="barcode">
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