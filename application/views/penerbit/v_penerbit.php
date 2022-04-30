<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
        if (!empty($this->session->flashdata('info'))) {?>
            <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>         
        <?php }
    ?>

    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="<?= base_url('Penerbit/tambah_penerbit'); ?>" class="btn btn-sm btn-success shadow-sm"><i class="fa fa-plus"></i> Tambah Penerbit</a>
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
                            <td>Nama Pengarang</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($data_penerbit AS $row) {?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nama_penerbit ?></td>
                                    <td>
                                        <a href="<?= base_url()?>Penerbit/edit/<?= $row->id_penerbit; ?>" class="btn btn-sm btn-warning shadow-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?= base_url()?>Penerbit/hapus/<?= $row->id_penerbit; ?>" class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Anda Yakin Ingin Menghapus ?');"><i class="fa fa-trash"></i> Hapus</a>
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