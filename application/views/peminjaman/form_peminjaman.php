<?php
    $tgl_pinjam = date('Y-m-d');

    // untuk menghitung selisih tanggal pinjam dan tanggal pengembalian
    $tujuh_hari = mktime(0,0,0,date("n"),date("j") + 7, date("Y"));
    $tgl_kembali = date('Y-m-d', $tujuh_hari);
?>

<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <form method="GET" action="<?= base_url('Peminjaman/tambah_peminjaman'); ?>">
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">ID Peminjam</label>
                    <div class="col-sm-4">
                        <input type="number" name="id_anggota" class="form-control" required>
                    </div>
                    <label class="col-sm-1 col-form-label">ID Buku</label>
                    <div class="col-sm-4">
                        <input type="number" name="id_buku" id="" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5">
                        <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-search pr-2"></i>Cari Data</button>
                    </div>
                </div>
            </form>
            <hr>
            <form method="POST" action="<?= base_url('Peminjaman/simpan'); ?>">

            <!-- Menampilkan Nama dan Judul Buku -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Nama Peminjam :</label>
                    <?php if(!empty($nama_anggota)) : ?>
                        <label class="col-sm-4 col-form-label"><?= $nama_anggota ?></label>
                    <?php else: ?>
                        <label class="col-sm-4 col-form-label">Nama</label>
                    <?php endif ?>
                    <label class="col-sm-1 col-form-label">Judul :</label>
                    <?php if(!empty($judul_buku)) : ?>
                        <label class="col-sm-4 col-form-label"><?= $judul_buku ?></label>
                    <?php else: ?>
                        <label class="col-sm-4 col-form-label">Judul Buku</label>
                    <?php endif ?>
                </div>

            <!-- Form Menmabahkan Data Pinjaman -->

                <div class="row mb-3">
                    <div class="col-sm-9">
                    <input type="hidden" class="form-control" name="kode_peminjaman" value="<?= $kode_peminjaman; ?>" required readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_penerbit" class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" value="<?= $tgl_pinjam; ?>" name="tgl_pinjam" readonly required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlah" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="tgl_kembali" value="<?= $tgl_kembali; ?>" readonly required>
                    </div>
                </div>
                <?php if(!empty($id_anggota)) : ?>
                    <input type="hidden" name="id_anggota" value="<?= $id_anggota ?>">
                <?php else : ?>
                    <input type="hidden" name="id_anggota" value="ID Anggota">
                <?php endif ?>
                <?php if(!empty($id_anggota)) : ?>
                    <input type="hidden" name="id_buku" value="<?= $id_buku ?>">
                <?php else : ?>
                    <input type="hidden" name="id_anggota" value="ID Buku">
                <?php endif ?>
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
