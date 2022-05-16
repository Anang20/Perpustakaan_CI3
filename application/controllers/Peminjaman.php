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

    // public function tambah_peminjaman()
    // {
    //     $isi['content'] = 'peminjaman/form_peminjaman';
    //     $isi['judul'] = 'Tambah Peminjaman';
    //     $isi['kode_peminjaman']    = $this->m_peminjaman->kode_peminjaman();
    //     $kode_anggota = $this->input->get("kode_anggota");
    //     if($this->input->get()) {
    //         $temp_anggota = $this->db->query("SELECT * FROM anggota WHERE kode_anggota="."'".$kode_anggota."'")->row_array();
    //         if (!empty($temp_anggota["kode_anggota"])) {
    //             if ($this->input->get("kode_anggota") == $temp_anggota["kode_anggota"]) {
    //                 $isi["kode_anggota"] = $temp_anggota["kode_anggota"];
    //                 $isi["content"] = "peminjaman/buku_kode";
    //                 if($this->input->post()) {
    //                     var_dump($this->input->post());
    //                 }else{
    //                     echo "Gagal";
    //                 }
    //             }
    //         }else{
    //             echo "Kode Anggota Tidak Ditemukan";
    //         }
    //     }
    //     $this->load->view('v_dashboard', $isi);
    // }

    public function get_kode_anggota()
    {
        $isi["content"] = "peminjaman/form_peminjaman";
        $isi["judul"] = "Tambah Peminjaman";
        if (!empty($this->input->get())) {
            foreach($this->input->get() as $key) {
                $temp_kode = $this->db->query("SELECT * FROM anggota WHERE kode_anggota='".$key."'")->row_array();
                if (!empty($temp_kode)) {
                    $isi["content"] = "peminjaman/buku_kode_satu";
                    $isi["kode_anggota"] = $temp_kode["kode_anggota"];
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
                echo "eh kok ilang anjing goblok";
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
                $isi["content"] = "peminjaman/buku_kode_tiga";
            }else{
                echo "eh kok ilang anjing goblok";
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
                $isi["content"] = "peminjaman/buku_kode_empat";
            }else{
                echo "eh kok ilang anjing goblok";
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
                $isi["content"] = "peminjaman/buku_kode_lima";
            }else{
                echo "eh kok ilang anjing goblok";
            }
            
        }
        $this->load->view("v_dashboard", $isi);
    }

    // Function Get Kode Lima

    public function get_buku_lima()
    {
        $isi["content"] = "peminjaman/buku_kode_empat";
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
                $isi["content"] = "peminjaman/buku_all_kode";
            }else{
                echo "eh kok ilang anjing goblok";
            }
            
        }
        $this->load->view("v_dashboard", $isi);
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