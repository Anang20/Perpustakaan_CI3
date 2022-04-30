<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="<?= base_url('Pengarang/simpan'); ?>">
                <div class="row mb-3">
                    <label for="nama_pengarang" class="col-sm-2 col-form-label">Nama Pengarang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_pengarang" placeholder="Masukkan Nama Pengarang" value="<?= set_value('nama_pengarang'); ?>" required>
                        <?= form_error('nama_pengarang', "<small class='text-danger pl-3'>",'</small>'); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5">
                        <a href="<?= base_url('Pengarang'); ?>" class="btn btn-warning mr-3"><i class="fas fa-arrow-circle-left pr-2"></i>Cancel</a>
                        <button type="submit" class="btn btn-success shadow-sm"><i class="fas fa-save pr-2"></i>Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>