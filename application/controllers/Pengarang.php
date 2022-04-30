<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengarang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengarang');
    }

    public function index()
    {
        $isi['content'] = 'pengarang/v_pengarang';
        $isi['judul'] = 'Daftar Data Pengarang';
        $isi['data_pengarang'] = $this->db->get('pengarang')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_pengarang()
    {
        $isi['content'] = 'pengarang/tambah_pengarang';
        $isi['judul'] = 'Form Tambah Pengarang';
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $isi['content'] = 'pengarang/tambah_pengarang';
        $isi['judul'] = 'Form Tambah Pengarang';

        // untuk vaidasi nama dan no hp unique jika nama dan no sudah ada maka akan meload halamn ulang
        $this->form_validation->set_rules('nama_pengarang', 'Nama Pengarang', 'trim|required|is_unique[pengarang.nama_pengarang]',['is_unique' => 'Pengarang ini sudah ada, mohon isi nama yang lain']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_dashboard', $isi);
        } else {
            $data['nama_pengarang'] = htmlspecialchars($this->input->post('nama_pengarang', true));
            $query = $this->db->insert('pengarang', $data);
            if ($query = true) {
                $this->session->set_flashdata('info', 'Data Berhasil Di simpan');
                redirect('Pengarang');
            }
        }
    }

    public function edit($id)
    {
        $isi['content'] = 'pengarang/edit_pengarang';
        $isi['judul'] = 'Edit Data Pengarang';
        // meload model m_pengarang yang functionnya edit
        $isi['data_pengarang'] = $this->m_pengarang->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $id_pengarang           = $this->input->post('id_pengarang');
        $data['nama_pengarang'] = $this->input->post('nama_pengarang');
        $query = $this->m_pengarang->update($id_pengarang, $data);
        // jika variabel query benar maka akan muncul pesan data berhasil diupdate dan di arahkan ke controller pengarang dan otomatis mengeksekusi method index
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Update');
            redirect('Pengarang');
        }
    }

    public function hapus($id)
    {
        $query = $this->m_pengarang->hapus($id);
        // jika variabel query benar maka akan muncul pesan data berhasil dihapus dan di arahkan ke controller anggota dan otomatis mengeksekusi method index
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Hapus');
            redirect('Pengarang');
        }
    }
}