<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_buku');
    }

    public function index()
    {
        $isi['content'] = 'buku/v_buku';
        $isi['judul'] = 'Daftar Data Buku';
        $isi['data_buku'] = $this->db->get('buku')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_buku()
    {
        $isi['content'] = 'buku/form_buku';
        $isi['judul'] = 'Form Tambah Buku';
        $isi['id_buku'] = $this->m_buku->id_buku();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $data = array(
            'id_buku'           => $this->input->post('id_buku'),
            'pengarang'         => $this->input->post('nama_pengarang'),
            'penerbit'          => $this->input->post('nama_penerbit'),
            'judul_buku'        => $this->input->post('judul_buku'),
            'tahun_terbit'      => $this->input->post('tahun_terbit'),
            'jumlah'            => $this->input->post('jumlah')
        );

        $query = $this->db->insert('buku', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Simpan');
            redirect('Buku');
        }
    }

    public function edit($id)
    {
        $isi['content'] = 'buku/edit_buku';
        $isi['judul']   = 'Form Edit Buku';
        // meload model anggota yg methodnya id_buku
        $isi['data']    = $this->m_buku->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $id_buku = $this->input->post('id_buku');
        $data = array(
            'id_buku'       => $this->input->post('id_buku'),
            'judul_buku'    => $this->input->post('judul_buku'),
            'pengarang'     => $this->input->post('nama_pengarang'),
            'penerbit'      => $this->input->post('nama_penerbit'),
            'tahun_terbit'  => $this->input->post('tahun_terbit'),
            'jumlah'        => $this->input->post('jumlah')
        );
        $query = $this->m_buku->update($id_buku, $data);
        // jika variabel query benar maka akan muncul pesan data berhasil diupdate dan di arahkan ke controller buku dan otomatis mengeksekusi method index
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Update');
            redirect('Buku');
        }
    }

    public function hapus($id)
    {
        $query = $this->m_buku->hapus($id);
        // jika variabel query benar maka akan muncul pesan data berhasil dihapus dan di arahkan ke controller anggota dan otomatis mengeksekusi method index
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Hapus');
            redirect('Buku');
        }
    }
}