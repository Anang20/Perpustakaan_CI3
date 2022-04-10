<?php

class M_security extends CI_Model {

    public function getSecurity()
    {
        // untuk mengecek username yg dihasilkan dari session ketika kita login
        $username = $this->session->userdata('username');
        // jika username kosong sessionnya dihapus kemudian di arahkan ke controller login untuk login terlebih dahulu
        if (empty($username)) {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
}