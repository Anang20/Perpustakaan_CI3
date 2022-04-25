<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="<?= base_url('Buku/simpan'); ?>">
                <div class="row mb-3">
                    <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="judul_buku" placeholder="Judul" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_pengarang" class="col-sm-2 col-form-label">Nama Pengarang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_pengarang" placeholder="Nama Pengarang" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_penerbit" class="col-sm-2 col-form-label">Nama Penerbit</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_penerbit" placeholder="Nama Penerbit" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-9">
                    <select name="tahun_terbit" class="form-control tahun_terbit">
                        <option value=""> - Pilih Tahun - </option>
                        <?php
                            for($tahun = 2000; $tahun <= 2022; $tahun++) {?>
                                <option value="<?= $tahun ?>"><?= $tahun; ?></option>
                            <?php }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="jumlah" placeholder="Jumlah" required>
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
    // untuk menampilkan select option pencarian tahun terbit
    $(document).ready(function () {
        $(".tahun_terbit").select2({
            theme: 'bootstrap4',
            placeholder: "- Pilih Tahun -"
        });
        $(window).resize(function() {
            $((".select2-container")).css("width", "100%");
        });
    });
</script>