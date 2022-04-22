<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="<?= base_url('Buku/update'); ?>">
                <input type="hidden" class="form-control" name="id_buku" value="<?= $data['id_buku']; ?>" readonly>
                <div class="row mb-3">
                    <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?= $data['judul_buku']; ?>" name="judul_buku" placeholder="Judul" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_pengarang" class="col-sm-2 col-form-label">Nama Pengarang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?= $data['pengarang']; ?>" name="nama_pengarang" placeholder="Nama Pengarang" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_penerbit" class="col-sm-2 col-form-label">Nama Penerbit</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?= $data['penerbit']; ?>" name="nama_penerbit" placeholder="Nama Penerbit" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-9">
                        <select name="tahun_terbit" class="form-control">
                            <option value=""> - Pilih Tahun - </option>
                            <?php 
                                for($tahun = 2000; $tahun <= 2022; $tahun++) {
                                    if ($data['tahun_terbit'] == $tahun) {?>
                                        <option value="<?= $tahun; ?>" selected><?= $tahun; ?></option>
                                    <?php } else {?>
                                        <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                    <?php }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?= $data['jumlah']; ?>" name="jumlah" placeholder="Jumlah" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5">
                        <a href="<?= base_url('Buku') ?>" class="btn btn-warning mr-3">Cancel</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
