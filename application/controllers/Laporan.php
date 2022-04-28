<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
        $this->load->helper('tgl_indo_helper');
        $this->load->library('pdf_report');
    }

    public function Peminjaman()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        
        $this->session->set_userdata('tanggal_awal', $tgl_awal);
        $this->session->set_userdata('tanggal_akhir', $tgl_akhir);
        // jika tidak ada inputan dari tanggal awal maupun akhir maka data akan ditampilkan semua
        if (empty($tgl_awal) || empty($tgl_akhir)) {
            $isi['judul'] = 'Laporan Peminjaman';
            $isi['content'] = 'laporan/v_laporan_peminjaman';
            $isi['data'] = $this->m_laporan->getAllData();
        // lain jika ada input tgl awal dan tgl akhir maka yg dilakukan adalah memfilter berdasarkan tgl yg di input
        } else {
            $isi['judul'] = 'Laporan Peminjaman';
            $isi['content'] = 'laporan/v_laporan_peminjaman';
            $isi['data'] = $this->m_laporan->filterData($tgl_awal, $tgl_akhir);
        }
        $this->load->view('v_dashboard', $isi);
    }

    public function refresh()
    {
        $isi['judul'] = 'Laporan Peminjaman';
        $isi['content'] = 'laporan/v_laporan_peminjaman';
        $isi['data'] = $this->m_laporan->getAllData();
        $this->load->view('v_dashboard', $isi);
    }

    public function pdf_peminjaman()
    {
        // jika tidak ada inputan tanggal dari tanggal awal hingga akhir maka data akan di tampilkan semua
        if (empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_akhir'))) {
            $isi['data'] = $this->m_laporan->getAllData();
            $this->load->view('laporan/pdf_peminjaman', $isi);
        } else {
            $isi['data'] = $this->m_laporan->filterData($this->session->set_userdata('tanggal_awal'),$this->session->set_userdata('tanggal_akhir'));
            $this->load->view('laporan/pdf_peminjaman', $isi);
        }
    }
}