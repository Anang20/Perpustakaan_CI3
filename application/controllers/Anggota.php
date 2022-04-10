<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_anggota');
    }

    public function index()
    {
        // akan memanggil file v_anggota yg ada di dalam folder anggota
        $isi['content'] = 'anggota/v_anggota';
        $isi['judul'] = 'Data Daftar Anggota';
        $isi['data_anggota'] = $this->db->get('anggota')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_anggota()
    {
        $isi['content'] = 'anggota/form_anggota';
        $isi['judul'] = 'Form Tambah Anggota';
        // meload model anggota yg methodnya id_anggota
        $isi['id_anggota'] = $this->m_anggota->id_anggota();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $data = array(
            'id_anggota'    => $this->input->post('id_anggota'),
            'nama_anggota'  => $this->input->post('nama_anggota'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat'        => $this->input->post('alamat'),
            'no_hp'         => $this->input->post('no_hp')
        );
        $query = $this->db->insert('anggota', $data);
        // jika variabel query benar maka akan muncul pesan data berhasil disimpan dan di arahkan ke controller anggota dan otomatis mengeksekusi method index
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Tambahkan');
            redirect('anggota');
        }
    }

    public function edit($id)
    {
        $isi['content'] = 'anggota/edit_anggota';
        $isi['judul']   = 'Form Edit Anggota';
        // meload model anggota yg methodnya id_anggota
        $isi['data']    = $this->m_anggota->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $id_anggota = $this->input->post('id_anggota');
        $data = array(
            'id_anggota'    => $this->input->post('id_anggota'),
            'nama_anggota'  => $this->input->post('nama_anggota'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat'        => $this->input->post('alamat'),
            'no_hp'         => $this->input->post('no_hp')
        );
        $query = $this->m_anggota->update($id_anggota, $data);
        // jika variabel query benar maka akan muncul pesan data berhasil diupdate dan di arahkan ke controller anggota dan otomatis mengeksekusi method index
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Update');
            redirect('anggota');
        }
    }

    public function hapus($id)
    {
        $query = $this->m_anggota->hapus($id);
        // jika variabel query benar maka akan muncul pesan data berhasil dihapus dan di arahkan ke controller anggota dan otomatis mengeksekusi method index
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Hapus');
            redirect('anggota');
        }
    }
}