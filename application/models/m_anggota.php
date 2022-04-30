<?php

class M_anggota extends CI_Model {

    public function kode_anggota()
    {
        $this->db->select('RIGHT(anggota.kode_anggota,4) as kode', false);
        $this->db->order_by('kode_anggota', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('anggota');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kode_anggota = "AP".$kodemax;
        return $kode_anggota;
    }

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