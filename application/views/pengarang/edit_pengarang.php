<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="<?= base_url('Pengarang/update'); ?>">
                <div class="row mb-3">
                    <input type="hidden" class="form-control" name="id_pengarang" value="<?= $data_pengarang['id_pengarang']; ?>" required readonly>
                    <label for="nama_pengarang" class="col-sm-2 col-form-label">Nama Pengarang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_pengarang" value="<?= $data_pengarang['nama_pengarang']; ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5">
                        <a href="<?= base_url('Pengarang'); ?>" class="btn btn-warning mr-3"><i class="fas fa-arrow-circle-left pr-2"></i>Cancel</a>
                        <button type="submit" class="btn btn-success shadow-sm"><i class="fas fa-save pr-2"></i>Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>