<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_anggota');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // akan memanggil file v_anggota yg ada di dalam folder anggota
        $isi['content']         = 'anggota/v_anggota';
        $isi['judul']           = 'Data Daftar Anggota';
        $isi['data_anggota']    = $this->db->get('anggota')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_anggota()
    {
        $isi['content']         = 'anggota/form_anggota';
        $isi['judul']           = 'Form Tambah Anggota';
        $isi['kode_anggota']    = $this->m_anggota->kode_anggota();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $isi['content']         = 'anggota/form_anggota';
        $isi['judul']           = 'Form Tambah Anggota';
        $isi['kode_anggota']    = $this->m_anggota->kode_anggota();

        // untuk vaidasi nama dan no hp unique jika nama dan no sudah ada maka akan meload halamn ulang
        $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required|is_unique[anggota.nama_anggota]',['is_unique' => 'Nama ini sudah ada, mohon isi nama yang lain']);
        $this->form_validation->set_rules('no_hp', 'No Hp', 'trim|required|is_unique[anggota.no_hp]',['is_unique' => 'Nomor hp ini sudah ada, mohon isi no hp yang lain']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_dashboard', $isi);
        } else {
            $data = array(
                'kode_anggota'  => $this->input->post('kode_anggota'),
                'nama_anggota'  => htmlspecialchars($this->input->post('nama_anggota', true)),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat'        => $this->input->post('alamat'),
                'no_hp'         => htmlspecialchars($this->input->post('no_hp', true))
            );
            $query = $this->db->insert('anggota', $data);
            // jika variabel query benar maka akan muncul pesan data berhasil disimpan dan di arahkan ke controller anggota dan otomatis mengeksekusi method index
            if ($query = true) {
                $this->session->set_flashdata('info', 'Data Berhasil Di Tambahkan');
                redirect('anggota');
            }
        }
    }

    public function edit($id)
    {
        $isi['content'] = 'anggota/edit_anggota';
        $isi['judul']   = 'Form Edit Anggota';
        // meload model anggota yg methodnya edit
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