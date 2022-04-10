<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    // ketika kita mengakses controller dashboard maka yg akan ditampilkan adlh yg mempunyai function index
    public function index()
    {
        $this->m_security->getSecurity();
        $isi['content'] = 'v_home';
        $isi['judul'] = 'Dashboard';
        $this->load->view('v_dashboard', $isi);
    }
}
