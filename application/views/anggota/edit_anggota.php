<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="<?= base_url('Anggota/update'); ?>">
                <input type="hidden" class="form-control" name="id_anggota" value="<?= $data['id_anggota']; ?>" readonly>
                <div class="row mb-3">
                    <div class="col-sm-9">
                    <input type="hidden" class="form-control" name="kode_anggota" value="<?= $data['kode_anggota']; ?>" required readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_anggota" class="col-sm-2 col-form-label">Nama Anggota</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?= $data['nama_anggota']; set_value('nama_anggota'); ?>" name="nama_anggota" placeholder="Nama Anggota" required>
                        <?= form_error('nama_anggota', "<small class='text-danger pl-3'>",'</small>'); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                    <select name="jenis_kelamin" class="form-control jenis_kelamin" required>
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
                        <a href="<?= base_url('anggota') ?>" class="btn btn-warning mr-3"><i class="fas fa-arrow-circle-left pr-2"></i>Cancel</a>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save pr-2"></i>Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // untuk menampilkan select option pencarian jenis kelamin
    $(document).ready(function () {
        $(".jenis_kelamin").select2({
            theme: 'bootstrap4',
            placeholder: "- Pilih Jenis Kelamin -"
        });
        $(window).resize(function() {
            $((".select2-container")).css("width", "100%");
        });
    });
</script>