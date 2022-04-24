<?php

class M_dashboard extends CI_Model {

    public function countAnggota()
    {
        // untuk menghitung jumlah baris dalam satu tabel anggota
        return $this->db->count_all('anggota');
    }

    public function countBuku()
    {
        // untuk menghitung jumlah baris dalam satu tabel buku
        return $this->db->count_all('buku');
    }

    public function countPinjam()
    {
        // untuk menghitung jumlah baris dalam satu tabel peminjaman
        return $this->db->count_all('peminjaman');
    }

    public function countPengembalian()
    {
        // untuk menghitung jumlah baris dalam satu tabel pengembalian
        return $this->db->count_all('pengembalian');
    }
}
