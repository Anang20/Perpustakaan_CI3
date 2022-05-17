<?php
    $tgl_pinjam = date('Y-m-d');

    // untuk menghitung selisih tanggal pinjam dan tanggal pengembalian
    $tujuh_hari = mktime(0,0,0,date("n"),date("j") + 7, date("Y"));
    $tgl_kembali = date('Y-m-d', $tujuh_hari);
?>

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <?php if(!empty($error_msg_anggota)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error_msg_anggota ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <form method="get" action="<?= base_url('peminjaman/get_kode_anggota'); ?>">
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Kode Anggota</label>
                    <div class="col-sm-4">
                        <input type="text" name="kode_anggota" class="form-control" required>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">Cari Kode Anggota</button>
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


</script>
