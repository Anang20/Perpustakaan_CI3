<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <title>Download Kartu</title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo-epus.png'); ?>" type="image/x-icon" class="rounded-circle">
  </head>
  <body>

    <div class="container" style="margin-top: 130px;">
        <div class="row">
            <div class="col-12 text-dark">
                <div class="row">
                    <div class="col-8 mx-auto rounded background" style="background-image: url('<?= base_url("assets/") ?>img/background-card-download.jpg'); background-size : 100%; width: 500px; height: 450px; background-repeat: no-repeat;">
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
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-1">
                                    <img src="<?= base_url('assets/'); ?>img/foto/<?php echo $data["foto"] ?>" class="rounded mx-auto" alt="logo" style="width: 130px; height: 130px;">
                                </div>
                                <div class="col-11">
                                    <table style="margin-left: 130px; font-size: 15px;">
                                        <thead>
                                            <tr>
                                                <td><b> Nama Anggota</b></td> 
                                                <td><b> : </b></td> 
                                                <td><b> <?= $data["nama_anggota"]; ?> </b></td> 
                                            </tr>
                                            <tr>
                                                <td><b> Alamat</b></td> 
                                                <td><b> : </b></td> 
                                                <td><b> <?= $data["alamat"]; ?> </b></td> 
                                            </tr>
                                            <tr>
                                                <td><b> Jenis Kelamin</b></td> 
                                                <td><b> : </b></td> 
                                                <td><b> <?= $data["jenis_kelamin"]; ?> </b></td> 
                                            </tr>
                                            <tr>
                                                <td><b> Nomor Handphone</b></td> 
                                                <td><b> : </b></td> 
                                                <td><b> <?= $data["no_hp"]; ?> </b></td> 
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-8 text-white">
                                <p style="margin-top: 10px; margin-left: 55px; font-size: 15px;"><b><?= $data["kode_anggota"] ?></b></b></p>
                            </div>
                            <div class="col-4" style="margin-top: 25px;">
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