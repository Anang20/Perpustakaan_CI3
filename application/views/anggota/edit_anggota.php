<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="<?= base_url('anggota/update'); ?>">
                <div class="row mb-3">
                    <label for="id_anggota" class="col-sm-2 col-form-label">Id Anggota</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="id_anggota" value="<?= $data['id_anggota']; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_anggota" class="col-sm-2 col-form-label">Nama Anggota</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?= $data['nama_anggota']; ?>" name="nama_anggota" placeholder="Nama Anggota" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                    <select name="jenis_kelamin" class="form-control" required>
                        <?php
                            if ($data['jenis_kelamin'] == "Laki-laki") {?>
                                <option value="Laki-laki" selected> Laki-laki </option>
                                <option value="Perempuan"> Perempuan </option>
                            <?php } else {?>
                                <option value="Laki-laki"> Laki-laki </option>
                                <option value="Perempuan" selected> Perempuan </option>
                            <?php }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                    <textarea name="alamat" class="form-control" cols="30" rows="5" required><?= $data['alamat']; ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_hp" class="col-sm-2 col-form-label">No. HP</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?= $data['no_hp']; ?>" name="no_hp" placeholder="No. HP" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5">
                        <a href="<?= base_url('anggota') ?>" class="btn btn-warning mr-3">Cancel</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>