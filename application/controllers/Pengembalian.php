<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

    public function index()
    {
        $isi['content'] = 'pengembalian/v_pengembalian';
        $isi['judul'] = 'Data Pengembalian';
        $this->load->model('m_pengembalian');
        $isi['data_pengembalian'] = $this->m_pengembalian->getAllData();
        $this->load->view('v_dashboard', $isi);
    }
}
