<?php

class M_buku extends CI_Model {

    public function kode_buku()
    {
        $this->db->select('RIGHT(buku.kode_buku,4) as kode', false);
        $this->db->order_by('kode_buku', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('buku');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kode_buku = "BK".$kodemax;
        return $kode_buku;
    }

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