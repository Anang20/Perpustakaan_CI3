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

            <div class="row">
                <div class="col-6">
                    <label class="col-form-label">Kode Buku ( Batas 5 Buku Peminjaman )</label> <br>
                    <?php  if(!empty($kode_buku)) : ?>
                        <label class="col-form-label"><?php echo "1. ". $kode_buku ?></label> <br>
                    <?php endif ?>
                    <?php  if(!empty($kode_buku_dua)) : ?>
                        <label class="col-form-label"><?php echo "2. ". $kode_buku_dua ?></label> <br>
                    <?php endif ?>
                    <?php  if(!empty($kode_buku_tiga)) : ?>
                        <label class="col-form-label"><?php echo "3. ". $kode_buku_tiga ?></label> <br>
                    <?php endif ?>
                    <?php  if(!empty($kode_buku_empat)) : ?>
                        <label class="col-form-label"><?php echo "4. ". $kode_buku_empat ?></label> <br>
                    <?php endif ?>
                    <?php  if(!empty($kode_buku_lima)) : ?>
                        <label class="col-form-label"><?php echo "5. ". $kode_buku_lima ?></label> <br>
                    <?php endif ?>
                </div>
                <div class="col-6 border-left">
                    <form action="" method="post">
                        <div class="row mb-4 mt-2">
                            <div class="col-12">
                                <div class="row">
                                    <label class="col-sm-5 col-form-label">Tanggal Peminjaman</label>
                                    <div class="col-sm-7">
                                        <input type="date" name="tgl_peminjaman" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-sm-5 col-form-label">Tanggal Pengembalian</label>
                                    <div class="col-sm-7">
                                        <input type="date" name="tgl_pengembalian" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6 mx-auto mt-3">
                                    <button type="submit" class="btn btn-primary" name="btn_simpan_satu">Simpan Pinjaman</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
