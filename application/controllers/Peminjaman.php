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

    public function get_kode_anggota()
    {
        $isi["content"] = "peminjaman/form_peminjaman";
        $isi["judul"] = "Tambah Peminjaman";
        if (!empty($this->input->get())) {
            foreach($this->input->get() as $key) {
                $temp_get = $this->input->get();
                $temp_kode = $this->db->query("SELECT * FROM anggota WHERE kode_anggota='".$key."'")->row_array();
                if (!empty($temp_kode)) {
                    $isi["content"] = "peminjaman/buku_kode_satu";
                    $isi["kode_anggota"] = $temp_kode["kode_anggota"];
                }else{
                    $isi["error_msg_anggota"] = "Maaf, Kode <b>". $temp_get["kode_anggota"]."</b> Tidak Ditemukan";
                }
            }
        }
        $this->load->view("v_dashboard", $isi);
    }

    // Function Get Buku Pertama

    public function get_buku_satu()
    {
        $isi["content"] = "peminjaman/buku_kode_satu";
        $isi["judul"] = "Tambah Peminjaman";
        if (!empty($this->input->post())) {
            $temp_post = $this->input->post("kode_buku");
            $temp_buku = $this->db->query("SELECT * FROM buku WHERE kode_buku='".$temp_post."'")->row_array();
            if (!empty($temp_buku)) {
                $isi["kode_anggota"] = $this->input->post("kode_anggota");
                $isi["content"] = "peminjaman/buku_kode_dua";
                $isi["kode_buku"] = $temp_buku["kode_buku"];
            }else{
                $isi["kode_anggota"] = $this->input->post("kode_anggota");
                $isi["error_msg_buku_satu"] = "Maaf, Kode Buku <b>". $temp_post ." </b>Tidak Ditemukan";
            }
            
        }
        $this->load->view("v_dashboard", $isi);
    }

    // Function Get Buku Kedua

    public function get_buku_dua()
    {
        $isi["content"] = "peminjaman/buku_kode_dua";
        $isi["judul"] = "Tambah Peminjaman";
        if (!empty($this->input->post())) {
            $temp_post = $this->input->post("kode_buku_dua");
            $temp_buku = $this->db->query("SELECT * FROM buku WHERE kode_buku='".$temp_post."'")->row_array();
            if (!empty($temp_buku)) {
                $isi["kode_anggota"] = $this->input->post("kode_anggota");
                $isi["kode_buku"] = $this->input->post("kode_buku_satu");
                $isi["kode_buku_dua"] = $temp_buku["kode_buku"];
                // Kode Anggota 
                $kode_anggota = $this->input->post("kode_anggota");
                $temp_id_anggota = $this->db->query("SELECT * FROM anggota WHERE kode_anggota ='".$kode_anggota."'")->row_array();
                // Kode Buku
                $kode_buku_satu = $this->input->post("kode_buku_satu");
                $temp_id_buku_satu = $this->db->query("SELECT * FROM buku WHERE kode_buku ='". $kode_buku_satu."'")->row_array();
                $data = [
                    "id_anggota"    => $temp_id_anggota["id_anggota"],
                    "id_buku"       => $temp_id_buku_satu["id_buku"],
                    "tgl_pinjam"    => $this->input->post("tgl_pinjam"),
                    'tgl_kembali'   => $this->input->post('tgl_kembali')
                ];
                $query = $this->db->insert('peminjaman', $data);
                $isi["content"] = "peminjaman/buku_kode_tiga";
            }else{
                $isi["kode_anggota"] = $this->input->post("kode_anggota");
                $isi["kode_buku"] = $this->input->post("kode_buku_satu");
                $isi["error_msg_buku_dua"] = "Maaf, Kode Buku <b>". $temp_post." </b>Tidak Ditemukan"; 
            }
            
        }
        $this->load->view("v_dashboard", $isi);
    }
    
    // Function Get Buku Ketiga

    public function get_buku_tiga()
    {
        $isi["content"] = "peminjaman/buku_kode_tiga";
        $isi["judul"] = "Tambah Peminjaman";
        if (!empty($this->input->post())) {
            $temp_post = $this->input->post("kode_buku_tiga");
            $temp_buku = $this->db->query("SELECT * FROM buku WHERE kode_buku='".$temp_post."'")->row_array();
            if (!empty($temp_buku)) {
                $isi["kode_anggota"] = $this->input->post("kode_anggota");
                $isi["kode_buku"] = $this->input->post("kode_buku_satu");
                $isi["kode_buku_dua"] = $this->input->post("kode_buku_dua");
                $isi["kode_buku_tiga"] = $temp_buku["kode_buku"];
                // Kode Anggota 
                $kode_anggota = $this->input->post("kode_anggota");
                $temp_id_anggota = $this->db->query("SELECT * FROM anggota WHERE kode_anggota ='".$kode_anggota."'")->row_array();
                // Kode Buku
                $kode_buku_dua = $this->input->post("kode_buku_dua");
                $temp_id_buku_dua = $this->db->query("SELECT * FROM buku WHERE kode_buku ='". $kode_buku_dua."'")->row_array();
                $data = [
                    "id_anggota"    => $temp_id_anggota["id_anggota"],
                    "id_buku"       => $temp_id_buku_dua["id_buku"],
                    "tgl_pinjam"    => $this->input->post("tgl_pinjam"),
                    'tgl_kembali'   => $this->input->post('tgl_kembali')
                ];
                $query = $this->db->insert('peminjaman', $data);
                $isi["content"] = "peminjaman/buku_kode_empat";
            }else{
                $isi["kode_anggota"] = $this->input->post("kode_anggota");
                $isi["kode_buku"] = $this->input->post("kode_buku_satu");
                $isi["kode_buku_dua"] = $this->input->post("kode_buku_dua");
                $isi["error_msg_buku_tiga"] = "Maaf, Kode Buku <b>". $temp_post."</b> Tidak Ditemukan";
            }
            
        }
        $this->load->view("v_dashboard", $isi);
    }

    // Function Get Buku Empat

    public function get_buku_empat()
    {
        $isi["content"] = "peminjaman/buku_kode_empat";
        $isi["judul"] = "Tambah Peminjaman";
        if (!empty($this->input->post())) {
            $temp_post = $this->input->post("kode_buku_empat");
            $temp_buku = $this->db->query("SELECT * FROM buku WHERE kode_buku='".$temp_post."'")->row_array();
            if (!empty($temp_buku)) {
                $isi["kode_anggota"] = $this->input->post("kode_anggota");
                $isi["kode_buku"] = $this->input->post("kode_buku_satu");
                $isi["kode_buku_dua"] = $this->input->post("kode_buku_dua");
                $isi["kode_buku_tiga"] = $this->input->post("kode_buku_tiga");
                $isi["kode_buku_empat"] = $temp_buku["kode_buku"];
                // Kode Anggota 
                $kode_anggota = $this->input->post("kode_anggota");
                $temp_id_anggota = $this->db->query("SELECT * FROM anggota WHERE kode_anggota ='".$kode_anggota."'")->row_array();
                // Kode Buku
                $kode_buku_tiga = $this->input->post("kode_buku_tiga");
                $temp_id_buku_tiga = $this->db->query("SELECT * FROM buku WHERE kode_buku ='". $kode_buku_tiga."'")->row_array();
                $data = [
                    "id_anggota"    => $temp_id_anggota["id_anggota"],
                    "id_buku"       => $temp_id_buku_tiga["id_buku"],
                    "tgl_pinjam"    => $this->input->post("tgl_pinjam"),
                    'tgl_kembali'   => $this->input->post('tgl_kembali')
                ];
                $query = $this->db->insert('peminjaman', $data);
                $isi["content"] = "peminjaman/buku_kode_lima";
            }else{
                $isi["kode_anggota"] = $this->input->post("kode_anggota");
                $isi["kode_buku"] = $this->input->post("kode_buku_satu");
                $isi["kode_buku_dua"] = $this->input->post("kode_buku_dua");
                $isi["kode_buku_tiga"] = $this->input->post("kode_buku_tiga");
                $isi["error_msg_buku_empat"] = "Maaf, Kode Buku <b>". $temp_post ." </b>Tidak Ditemukan";
            }
            
        }
        $this->load->view("v_dashboard", $isi);
    }

    // Function Get Kode Lima

    public function get_buku_lima()
    {
        $isi["content"] = "peminjaman/buku_kode_lima";
        $isi["judul"] = "Tambah Peminjaman";
        if (!empty($this->input->post())) {
            $temp_post = $this->input->post("kode_buku_lima");
            $temp_buku = $this->db->query("SELECT * FROM buku WHERE kode_buku='".$temp_post."'")->row_array();
            if (!empty($temp_buku)) {
                $isi["kode_anggota"] = $this->input->post("kode_anggota");
                $isi["kode_buku"] = $this->input->post("kode_buku_satu");
                $isi["kode_buku_dua"] = $this->input->post("kode_buku_dua");
                $isi["kode_buku_tiga"] = $this->input->post("kode_buku_tiga");
                $isi["kode_buku_empat"] = $this->input->post("kode_buku_empat");
                $isi["kode_buku_lima"] = $temp_buku["kode_buku"];
                // Kode Anggota 
                $kode_anggota = $this->input->post("kode_anggota");
                $temp_id_anggota = $this->db->query("SELECT * FROM anggota WHERE kode_anggota ='".$kode_anggota."'")->row_array();
                // Kode Buku
                $kode_buku_empat = $this->input->post("kode_buku_empat");
                $temp_id_buku_empat = $this->db->query("SELECT * FROM buku WHERE kode_buku ='". $kode_buku_empat."'")->row_array();
                $data = [
                    "id_anggota"    => $temp_id_anggota["id_anggota"],
                    "id_buku"       => $temp_id_buku_empat["id_buku"],
                    "tgl_pinjam"    => $this->input->post("tgl_pinjam"),
                    'tgl_kembali'   => $this->input->post('tgl_kembali')
                ];
                $query = $this->db->insert('peminjaman', $data);
                $isi["content"] = "peminjaman/buku_all_kode";
            }else{
                $isi["kode_anggota"] = $this->input->post("kode_anggota");
                $isi["kode_buku"] = $this->input->post("kode_buku_satu");
                $isi["kode_buku_dua"] = $this->input->post("kode_buku_dua");
                $isi["kode_buku_tiga"] = $this->input->post("kode_buku_tiga");
                $isi["kode_buku_empat"] = $this->input->post("kode_buku_empat");
                $isi["error_msg_buku_lima"] = "Maaf, Kode Buku <b> ".$temp_post."</b> Tidak Ditemukan";
            }
            
        }
        $this->load->view("v_dashboard", $isi);
    }

    // Function Simpan Pertama

    public function simpan_buku_satu()
    {
        // Kode Anggota 
        $kode_anggota = $this->input->post("kode_anggota");
        $temp_id_anggota = $this->db->query("SELECT * FROM anggota WHERE kode_anggota ='".$kode_anggota."'")->row_array();
        // Kode Buku
        $kode_buku = $this->input->post("kode_buku");
        $temp_id_buku = $this->db->query("SELECT * FROM buku WHERE kode_buku ='". $kode_buku."'")->row_array();
        $data = [
            "id_anggota"    => $temp_id_anggota["id_anggota"],
            "id_buku"       => $temp_id_buku["id_buku"],
            "tgl_pinjam"    => $this->input->post("tgl_pinjam"),
            'tgl_kembali'   => $this->input->post('tgl_kembali')
        ];
        $query = $this->db->insert('peminjaman', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Simpan');
            redirect('peminjaman');
        }
    }

    public function simpan_buku_dua()
    {
        // Kode Anggota 
        $kode_anggota = $this->input->post("kode_anggota");
        $temp_id_anggota = $this->db->query("SELECT * FROM anggota WHERE kode_anggota ='".$kode_anggota."'")->row_array();
        // Kode Buku
        $kode_buku_dua = $this->input->post("kode_buku_dua");
        $temp_id_buku_dua = $this->db->query("SELECT * FROM buku WHERE kode_buku ='". $kode_buku_dua."'")->row_array();
        $data = [
            "id_anggota"    => $temp_id_anggota["id_anggota"],
            "id_buku"       => $temp_id_buku_dua["id_buku"],
            "tgl_pinjam"    => $this->input->post("tgl_pinjam"),
            'tgl_kembali'   => $this->input->post('tgl_kembali')
        ];
        $query = $this->db->insert('peminjaman', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Simpan');
            redirect('peminjaman');
        }
    }

    public function simpan_buku_tiga()
    {
        // Kode Anggota 
        $kode_anggota = $this->input->post("kode_anggota");
        $temp_id_anggota = $this->db->query("SELECT * FROM anggota WHERE kode_anggota ='".$kode_anggota."'")->row_array();
        // Kode Buku
        $kode_buku_tiga = $this->input->post("kode_buku_tiga");
        $temp_id_buku_tiga = $this->db->query("SELECT * FROM buku WHERE kode_buku ='". $kode_buku_tiga."'")->row_array();
        $data = [
            "id_anggota"    => $temp_id_anggota["id_anggota"],
            "id_buku"       => $temp_id_buku_tiga["id_buku"],
            "tgl_pinjam"    => $this->input->post("tgl_pinjam"),
            'tgl_kembali'   => $this->input->post('tgl_kembali')
        ];
        $query = $this->db->insert('peminjaman', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Simpan');
            redirect('peminjaman');
        }
    }

    public function simpan_buku_empat()
    {
        // Kode Anggota 
        $kode_anggota = $this->input->post("kode_anggota");
        $temp_id_anggota = $this->db->query("SELECT * FROM anggota WHERE kode_anggota ='".$kode_anggota."'")->row_array();
        // Kode Buku
        $kode_buku_empat = $this->input->post("kode_buku_empat");
        $temp_id_buku_empat = $this->db->query("SELECT * FROM buku WHERE kode_buku ='". $kode_buku_empat."'")->row_array();
        $data = [
            "id_anggota"    => $temp_id_anggota["id_anggota"],
            "id_buku"       => $temp_id_buku_empat["id_buku"],
            "tgl_pinjam"    => $this->input->post("tgl_pinjam"),
            'tgl_kembali'   => $this->input->post('tgl_kembali')
        ];
        $query = $this->db->insert('peminjaman', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Simpan');
            redirect('peminjaman');
        }
    }

    // Function Simpan Lima

    public function simpan_buku_lima()
    {
        // Kode Anggota 
        $kode_anggota = $this->input->post("kode_anggota");
        $temp_id_anggota = $this->db->query("SELECT * FROM anggota WHERE kode_anggota ='".$kode_anggota."'")->row_array();
        // Kode Buku
        $kode_buku_lima = $this->input->post("kode_buku_lima");
        $temp_id_buku_lima = $this->db->query("SELECT * FROM buku WHERE kode_buku ='". $kode_buku_lima."'")->row_array();
        $data = [
            "id_anggota"    => $temp_id_anggota["id_anggota"],
            "id_buku"       => $temp_id_buku_lima["id_buku"],
            "tgl_pinjam"    => $this->input->post("tgl_pinjam"),
            'tgl_kembali'   => $this->input->post('tgl_kembali')
        ];
        $query = $this->db->insert('peminjaman', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Simpan');
            redirect('peminjaman');
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