<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
        if (!empty($this->session->flashdata('info'))) {?>
            <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>         
        <?php }
    ?>

    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="<?= base_url('Peminjaman/tambah_peminjaman'); ?>" class="btn btn-sm btn-success shadow-sm"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
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
                            <td>Peminjam</td>
                            <td>Buku</td>
                            <td>Tanggal Pinjam</td>
                            <td>Tanggal Kembali</td>
                            <td>Status</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($data_peminjaman AS $row) {
                                $tgl_kembali = new DateTime($row->tgl_kembali);
                                $tgl_sekarang = new DateTime();
                                $selisih = $tgl_sekarang->diff($tgl_kembali)->format("%a");
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nama_anggota ?></td>
                                    <td><?= $row->judul_buku ?></td>
                                    <td><?= $row->tgl_pinjam ?></td>
                                    <td><?= $row->tgl_kembali ?></td>
                                    <td>
                                        <?php
                                            if ($tgl_kembali >= $tgl_sekarang OR $selisih == 0) {
                                                echo "<span style='background-color: orange; color:white; padding: 3px;'>Belum Dikembalikan</span>";
                                            } else {
                                                echo "Telat <b style = 'color: red;'>".$selisih."</b> Hari <br> <span style='background-color: red; color:white;'> Denda Perhari = 1000</span>";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <span><a href="<?= base_url('Peminjaman/kembalikan/')?><?= $row->id_pinjam; ?>" class="btn btn-sm btn-success shadow-sm" onclick="return confirm('Yakin Buku Ini Mau Dikembalikan')"><i class="fa fa-edit"></i> Kembalikan</a></span>
                                    </td>
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