<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Download Card</title>
  </head>
  <body>

    <div class="container" style="margin-top: 130px;">
        <div class="row">
            <div class="col-12 text-dark">
                <div class="row">
                    <div class="col-8 mx-auto rounded background" style="background-image: url('<?= base_url("assets/") ?>img/background-card-download.jpg'); background-size : 100%; background-repeat: no-repeat;">
                        <div class="row">
                            <div class="col-3">
                                <img src="<?= base_url('assets/'); ?>img/logo-epus.png" class="rounded mx-auto d-block" alt="logo" style="width: 60px; height: 50px;">
                            </div>
                            <div class="col-9 text-center">
                                <h5 class="text-white"><b>Kartu Anggota E-Perpus</b></h5>
                                <small class="text-white" style="font-size: 10px;">Sebagai tanda anggota perpustakaan yang digunakan untuk meminjam buku</small>
                            </div>
                        </div>
                        <!-- <hr class="mt-1"> -->
                        <div class="container">
                            <div class="row" style="margin-top: -15px;">
                                <div class="col-2">
                                    <img src="<?= base_url('assets/'); ?>img/foto/<?php echo $data["foto"] ?>" class="rounded mx-auto d-block" alt="logo" style="width: 65px; height: 80px;">
                                </div>
                                <div class="col-10">
                                    <!-- Nama Anggota -->
                                    <p style="margin-left: 30px; font-size: 10px; margin-bottom: 3px;" > <b> Nama Anggota : <?= $data["nama_anggota"] ?>  </b> </p>
                                    <p style="margin-left: 30px; font-size: 10px; margin-bottom: 3px;"> <b> Alamat : <?= $data["alamat"] ?> </b> </p>
                                    <p style="margin-left: 30px; font-size: 10px; margin-bottom: 3px;" > <b> Jenis Kelamin : <?= $data["jenis_kelamin"] ?> </b> </p>
                                    <p style="margin-left: 30px; font-size: 10px; margin-bottom: 3px;" > <b> Nomor Handphone : <?= $data["no_hp"] ?> </b> </p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-8 text-white">
                                <p style="margin-top: 10px; font-size: 12px;">Kode Anggota : <b><?= $data["kode_anggota"] ?></b></b></p>
                            </div>
                            <div class="col-4" style="margin-top: 13px">
                                <span>
                                    <?php
                                        $generator = new Picqer\Barcode\BarcodeGeneratorHTML2();
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        window.print();
    </script>
</body>
</html>