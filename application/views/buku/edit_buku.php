<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="<?= base_url('Buku/update'); ?>">
                <input type="hidden" class="form-control" name="id_buku" value="<?= $data['id_buku']; ?>" readonly>
                
                <div class="row mb-3">
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?= $data['kode_buku']; ?>" name="kode_buku" placeholder="Judul" required readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?= $data['judul_buku']; ?>" name="judul_buku" placeholder="Judul" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nama_pengarang" class="col-sm-2 col-form-label">Nama Pengarang</label>
                    <div class="col-sm-9">
                        <select name="id_pengarang" class="form-control pengarang" required>
                            <option value=""> -- Pilih Pengarang -- </option>
                            <?php
                                foreach ($pengarang AS $key) {
                                    if ($data['id_pengarang'] == $key->id_pengarang) {?>
                                        <option value="<?= $key->id_pengarang; ?>" selected><?= $key->nama_pengarang; ?></option>
                                    <?php } else {?>
                                        <option value="<?= $key->id_pengarang; ?>"><?= $key->nama_pengarang; ?></option>
                                    <?php }
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nama_penerbit" class="col-sm-2 col-form-label">Nama Penerbit</label>
                    <div class="col-sm-9">
                        <select name="id_penerbit" class="form-control penerbit" required>
                            <option value=""> -- Pilih Penerbit -- </option>
                            <?php
                                foreach ($penerbit AS $key) {
                                    if ($data['id_penerbit'] == $key->id_penerbit) {?>
                                        <option value="<?= $key->id_penerbit; ?>" selected><?= $key->nama_penerbit; ?></option>
                                    <?php } else {?>
                                        <option value="<?= $key->id_penerbit; ?>"><?= $key->nama_penerbit; ?></option>
                                    <?php }
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="tahun_terbit" value="<?= $data['tahun_terbit']; ?>">
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
                        <a href="<?= base_url('Buku') ?>" class="btn btn-warning mr-3"><i class="fas fa-arrow-circle-left pr-2"></i>Cancel</a>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save pr-2"></i>Simpan</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

<script>
    // untuk menampilkan select option pencarian tahun pengarang
    $(document).ready(function () {
        $(".pengarang").select2({
            theme: 'bootstrap4',
            placeholder: "-- Pilih Pengarang --"
        });
        $(window).resize(function() {
            $((".select2-container")).css("width", "100%");
        });
    });
    // untuk menampilkan select option pencarian tahun penerbit
    $(document).ready(function () {
        $(".penerbit").select2({
            theme: 'bootstrap4',
            placeholder: "-- Pilih Penerbit --"
        });
        $(window).resize(function() {
            $((".select2-container")).css("width", "100%");
        });
    });
</script>