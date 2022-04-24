<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
        if (!empty($this->session->flashdata('info'))) {?>
            <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>         
        <?php }
    ?>

    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="<?= base_url('Pengembalian/tambah_peminjaman'); ?>" class="btn btn-sm btn-success shadow-sm"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
        </div>
    </div>

    <!-- DataTables -->
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Peminjam</td>
                            <td>Buku</td>
                            <td>Tanggal Pinjam</td>
                            <td>Tanggal Kembali</td>
                            <td>Tanggal Dikembalikan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ( $data_pengembalian AS $row ) {?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nama_anggota; ?></td>
                                    <td><?= $row->judul_buku; ?></td>
                                    <td><?= $row->tgl_pinjam; ?></td>
                                    <td><?= $row->tgl_kembali; ?></td>
                                    <td><?= $row->tgl_kembalikan; ?></td>
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