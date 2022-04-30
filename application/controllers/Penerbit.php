<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_penerbit');
    }

    public function index()
    {
        $isi['content'] = 'penerbit/v_penerbit';
        $isi['judul'] = 'Daftar Data Penerbit';
        $isi['data_penerbit'] = $this->db->get('penerbit')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_penerbit()
    {
        $isi['content'] = 'penerbit/tambah_penerbit';
        $isi['judul'] = 'Form Tambah Penerbit';
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $data['nama_penerbit'] = $this->input->post('nama_penerbit');
        $query = $this->db->insert('penerbit', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di simpan');
            redirect('Penerbit');
        }
    }

    public function edit($id)
    {
        $isi['content'] = 'penerbit/edit_penerbit';
        $isi['judul'] = 'Edit Data Penerbit';
        // meload model m_pengarang yang functionnya edit
        $isi['data_penerbit'] = $this->m_penerbit->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $id_penerbit           = $this->input->post('id_penerbit');
        $data['nama_penerbit'] = $this->input->post('nama_penerbit');
        $query = $this->m_penerbit->update($id_penerbit, $data);
        // jika variabel query benar maka akan muncul pesan data berhasil diupdate dan di arahkan ke controller pengarang dan otomatis mengeksekusi method index
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Update');
            redirect('Penerbit');
        }
    }

    public function hapus($id)
    {
        $query = $this->m_penerbit->hapus($id);
        // jika variabel query benar maka akan muncul pesan data berhasil dihapus dan di arahkan ke controller anggota dan otomatis mengeksekusi method index
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Hapus');
            redirect('Penerbit');
        }
    }
}