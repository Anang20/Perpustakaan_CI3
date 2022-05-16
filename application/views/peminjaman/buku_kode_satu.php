<?php
    $tgl_pinjam = date('Y-m-d');

    // untuk menghitung selisih tanggal pinjam dan tanggal pengembalian
    $tujuh_hari = mktime(0,0,0,date("n"),date("j") + 7, date("Y"));
    $tgl_kembali = date('Y-m-d', $tujuh_hari);
?>

<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <div class="row mb-4">
                <label class="col-sm-2 col-form-label">Kode Peminjam :</label>
                <?php if(!empty($kode_anggota)) : ?>
                    <label class="col-sm-4 col-form-label"><?= $kode_anggota ?></label>
                <?php else: ?>
                    <label class="col-sm-4 col-form-label">Kode Anggota</label>
                <?php endif ?>
            </div>
            <hr>
            <form action="<?= base_url("peminjaman/get_buku_satu") ?>" method="POST">
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Kode Buku</label>
                    <?php if(!empty($kode_anggota)) : ?>
                        <input type="hidden" name="kode_anggota" value="<?= $kode_anggota ?>">
                    <?php endif ?>
                    <div class="col-sm-4">
                        <input type="text" name="kode_buku" class="form-control" required>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Cari Kode Buku</button>
                    </div>
                </div>
            </form>
            <label class="col-form-label">Kode Buku ( Batas 5 Buku Peminjaman )</label> <br>
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


</script>
