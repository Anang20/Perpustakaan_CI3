<?php

class M_pengembalian extends CI_Model {

    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('pengembalian');
        // untuk mengambil nama anggota berdasarkan id anggota
        $this->db->join('anggota', 'pengembalian.id_anggota = anggota.id_anggota');
        // untuk mengambil judul buku berdasarkan id buku
        $this->db->join('buku', 'pengembalian.id_buku = buku.id_buku');
        return $this->db->get()->result();
    }
}