<?php

class M_buku extends CI_Model {

    public function edit($id)
    {
        $this->db->where('id_buku', $id);
        return $this->db->get('buku')->row_array();
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