<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_anggota');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $isi['content']         = 'cetak/v_cetak';
        $isi['judul']           = 'Cetak Kartu Anggota E-Perpus';
        $isi['data_anggota']    = $this->db->get('anggota')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function detail($id)
    {
        $isi["content"]         = 'cetak/detail';
        $isi["judul"]           = 'Kartu Anggota E-Perpus';
        $isi["data"]            = $this->m_anggota->edit($id);
        $this->load->view("v_dashboard", $isi);
    }

    public function download($id)
    {
        $isi["content"]         = 'cetak/download';
        $isi["judul"]           = 'Kartu Anggota E-Perpus';
        $isi["data"]            = $this->m_anggota->edit($id);
        $this->load->view("cetak/download", $isi);
    }
}