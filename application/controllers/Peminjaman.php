<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_peminjaman');
    }

    public function index()
    {
        $isi['content'] = 'peminjaman/v_peminjaman';
        $isi['judul'] = 'Data Peminjaman';
        $isi['data_peminjaman'] = $this->m_peminjaman->getDataPeminjaman();
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_peminjaman()
    {
        $isi['content'] = 'peminjaman/form_peminjaman';
        $isi['judul'] = 'Tambah Peminjaman';
        $isi['kode_peminjaman']    = $this->m_peminjaman->kode_peminjaman();
        $id_anggota = $this->input->get("id_anggota");
        $id_buku = $this->input->get("id_buku");
        if($this->input->get()) {
            $temp_anggota = $this->db->query("SELECT * FROM anggota WHERE id_anggota="."'".$id_anggota."'")->row_array();
            $temp_buku = $this->db->query("SELECT * FROM buku WHERE id_buku="."'".$id_buku."'")->row_array();
            if (!empty($temp_anggota["id_anggota"])) {
                if ($this->input->get("id_anggota") == $temp_anggota["id_anggota"]) {
                    if (!empty($temp_buku)) {
                        if ($this->input->get("id_buku") == $temp_buku["id_buku"]) {
                            $isi["nama_anggota"] = $temp_anggota["nama_anggota"];
                            $isi["judul_buku"] = $temp_buku["judul_buku"];
                            $isi["id_anggota"] = $temp_anggota["id_anggota"];
                            $isi["id_buku"] = $temp_buku["id_buku"];
                        }
                    }else{
                        echo "ID Buku Tidak Ditemukan";
                    }
                }
            }else{
                echo "ID Anggota Tidak Ditemukan";
            }
        }
        $this->load->view('v_dashboard', $isi);
    }

    
    public function simpan()
    {
        $data = array(
            'kode_peminjaman' => $this->input->post('kode_peminjaman'),
            'id_anggota'      => $this->input->post('id_anggota'),
            'id_buku'         => $this->input->post('id_buku'),
            'tgl_pinjam'      => $this->input->post('tgl_pinjam'),
            'tgl_kembali'     => $this->input->post('tgl_kembali')
        );

        $query = $this->db->insert('peminjaman', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Simpan');
            redirect('Peminjaman');
        }
    }

    public function jumlah_buku()
    {
        $id = $this->input->post('id');
        $data = $this->m_peminjaman->jumlah_buku($id);
        echo json_encode($data);
    }

    public function kembalikan($id)
    {
        $data = $this->m_peminjaman->getDataById($id);
        $kembalikan = array(
            'id_anggota'     => $data['id_anggota'],
            'id_buku'        => $data['id_buku'],
            'tgl_pinjam'     => $data['tgl_pinjam'],
            'tgl_kembali'    => $data['tgl_kembali'],
            'tgl_kembalikan' => date('Y-m-d')
        );

        $query = $this->db->insert('pengembalian', $kembalikan);
        if ($query = true) {
            // pada saat tombol kembalikan di klik maka disimpan dulu ke tabel pengembalian, kemudiaan seetelah berhasil di simpan maka data peminjaman yang ada di tabel peminjaman itu dihapus sehingga datanya tidak ada lagi
            $delete = $this->m_peminjaman->deletePm($id);
            if ($delete = true) {
                $this->session->set_flashdata('info', 'Buku Berhasil Di Kembalikan');
                redirect('Peminjaman');
            }
        }
    }

}