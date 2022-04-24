<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    // ketika kita mengakses controller dashboard maka yg akan ditampilkan adlh yg mempunyai function index
    public function index()
    {
        $this->m_security->getSecurity();
        $isi['content'] = 'v_home';
        $isi['judul'] = 'Dashboard';
        // untuk menghubugkan controller dashboard ke model dashboard
        $this->load->model('m_dashboard');
        // menghubungkan model m_dashboard yang functionnya countAnggota
        $isi['anggota'] = $this->m_dashboard->countAnggota();
        $isi['buku'] = $this->m_dashboard->countBuku();
        $isi['peminjaman'] = $this->m_dashboard->countPinjam();
        $isi['pengembalian'] = $this->m_dashboard->countPengembalian();
        $this->load->view('v_dashboard', $isi);
    }
}
