<?php

class M_buku extends CI_Model {

    public function ambil_data_buku()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('pengarang', 'buku.id_pengarang = pengarang.id_pengarang');
        $this->db->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit');
        return $this->db->get();
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('pengarang', 'buku.id_pengarang = pengarang.id_pengarang');
        $this->db->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit');
        $this->db->where('buku.id_buku', $id);
        return $this->db->get()->row_array();
    }

    public function update($id_buku, $data)
    {
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_buku', $id);
        $this->db->delete('buku');
    }
}