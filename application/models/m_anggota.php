<?php

class M_anggota extends CI_Model {

    public function edit($id)
    {
        $this->db->where('id_anggota', $id);
        return $this->db->get('anggota')->row_array();
    }

    public function update($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_anggota', $id);
        $this->db->delete('anggota');
    }
}