<?php

class M_peminjaman extends CI_Model {

    public function kode_peminjaman()
    {
        $this->db->select('RIGHT(peminjaman.kode_peminjaman,4) as kode', false);
        $this->db->order_by('kode_peminjaman', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('peminjaman');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kode_peminjaman = "PM".$kodemax;
        return $kode_peminjaman;
    }


    public function jumlah_buku($id)
    {
        $this->db->select('jumlah');
        $this->db->from('buku');
        $this->db->where('id_buku', $id);
        return $this->db->get()->row_array();
    }

    public function getDataPeminjaman()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        // untuk join antar tabel peminjaman dan anggota
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota');
        // untuk join antar tabel peminjaman dan buku
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        return $this->db->get()->result();
    }

    public function getDataById($id)
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        $this->db->where('peminjaman.id_pinjam', $id);
        return $this->db->get()->row_array();
    }

    public function deletePm($id)
    {
        $this->db->where('id_pinjam', $id);
        $this->db->delete('peminjaman');
    }
}