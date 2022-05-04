<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
    <style type="text/css">
        .tgl_akhir {
            margin-left: -15px;
        }

        .btn-filter {
            margin-left: -30px;
            width: 5rem;
        }

        .btn-refresh {
            margin-left: -29px;
            width: 6rem;
        }

        .btn-pdf {
            margin-left: -102px;
        }
    </style>
</head>
<body>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTables -->
        <div class="card shadow">
            <div class="box-header mt-3">
                <form action="<?= base_url('laporan/peminjaman'); ?>" method="POST">
                    <div class="row">
                        <div class="col-md-2 ml-4">
                            <h5 class="text-success"><b>Filter Laporan</b></h5>
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="tgl_awal" class="form-control" placeholder="Tanggal Awal" onfocus="(this.type='date')">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="tgl_akhir" class="form-control tgl_akhir" placeholder="Tanggal Akhir" onfocus="(this.type='date')">
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-success btn-block btn-filter d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-filter fa-sm"></i> Filter</button>
                        </div>
                        <div class="col-md-2">
                            <a href="<?= base_url('Laporan/peminjaman'); ?>" class="btn btn-warning btn-block btn-refresh d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-sync-alt"></i> Refresh</a>
                        </div>
                        <div class="col-md-2">
                            <a href="<?= base_url('Laporan/pdf_peminjaman'); ?>" class="btn btn-danger btn-block btn-pdf d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" target="_blank"><i class="fas fa-file-pdf"></i> Download PDF</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Peminjaman</td>
                                <td>Peminjam</td>
                                <td>Buku</td>
                                <td>Tanggal Pinjam</td>
                                <td>Tanggal Kembali</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($data AS $row) {?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row->kode_peminjaman; ?></td>
                                        <td><?= $row->nama_anggota; ?></td>
                                        <td><?= $row->judul_buku; ?></td>
                                        <td><?= tgl_indo_medium($row->tgl_pinjam); ?></td>
                                        <td><?= tgl_indo_medium($row->tgl_kembali); ?></td>
                                    </tr>
                                <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- container-fluid -->

    </div>
    <!-- End of Main Content -->
</body>
</html>
