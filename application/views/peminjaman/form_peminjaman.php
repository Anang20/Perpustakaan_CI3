<?php
    $tgl_pinjam = date('Y-m-d');

    // untuk menghitung selisih tanggal pinjam dan tanggal pengembalian
    $tujuh_hari = mktime(0,0,0,date("n"),date("j") + 7, date("Y"));
    $tgl_kembali = date('Y-m-d', $tujuh_hari);
?>

<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="<?= base_url('Peminjaman/simpan'); ?>">
                <div class="row mb-3">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Peminjam</label>
                    <div class="col-sm-9">
                        <select name="id_anggota" id="anggota" class="form-control" required>
                            <option value=""> - Pilih Peminjam - </option>
                            <?php
                                foreach ($peminjam AS $key) {?>
                                    <option value="<?= $key->id_anggota; ?>"><?= $key->nama_anggota ?></option>
                                <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Buku</label>
                    <div class="col-sm-9">
                        <select name="id_buku" id="id_buku" class="form-control" required>
                            <option value=""> - Pilih Buku - </option>
                            <?php
                                foreach ($buku AS $key) {?>
                                    <option value="<?= $key->id_buku; ?>"><?= $key->judul_buku ?></option>
                                <?php }
                            ?>
                        </select>
                    </div>
                </div>
              
                <div class="row mb-3">
                    <label for="nama_penerbit" class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" value="<?= $tgl_pinjam; ?>" name="tgl_pinjam" readonly required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlah" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="tgl_kembali" value="<?= $tgl_kembali; ?>" readonly required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5">
                        <a href="<?= base_url('Peminjaman') ?>" class="btn btn-warning mr-3"><i class="fas fa-arrow-circle-left pr-2"></i>Cancel</a>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save pr-2"></i>Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- untuk validasi buku jika buku yang stoknya kosong dipilih maka halaman reload otomatis -->
<script>

    $('#id_buku').change(function(){
        var id = $(this).val();
        $.ajax({
            url : '<?= base_url('Peminjaman/jumlah_buku')?>',
            data : {id:id},
            method : 'post',
            dataType : 'json',
            success : function(hasil){
                var jumlah = JSON.stringify(hasil.jumlah);
                var jumlah1 = jumlah.split('"').join('');
                if (jumlah1 <= 0) {
                    alert('Maaf, Stok untuk buku ini sedang kosong');
                    location.reload();
                }
            }
        });
    });

    $(document).ready(function () {
        // untuk menampilkan select option pencarian peminjam
        $("#anggota").select2({
            theme: 'bootstrap4',
            placeholder: "- Pilih Peminjam -"
        });
        $(window).resize(function() {
            $((".select2-container")).css("width", "100%");
        });

        
        $("#id_buku").select2({
            theme: 'bootstrap4',
            placeholder: "- Pilih Buku -"
        });
        $(window).resize(function() {
            $((".select2-container")).css("width", "100%");
        });
    });

</script>
