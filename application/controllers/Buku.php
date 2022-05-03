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
        $isi['data_buku'] = $this->m_buku->ambil_data_buku();
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_buku()
    {
        $isi['content'] = 'buku/tambah_buku';
        $isi['judul'] = 'Form Tambah Buku';
        // untuk membuat kode buku otomatis yang dilakukn di dalam m_buku di function kode_buku
        $isi['kode_buku'] = $this->m_buku->kode_buku();
        // untuk mengambil data dari tabel pengarang
        $isi['pengarang'] = $this->db->get('pengarang')->result();
        // untuk mengambil data dari tabel penerbit
        $isi['penerbit'] = $this->db->get('penerbit')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function edit($id)
    {
        $isi['content'] = 'buku/edit_buku';
        $isi['judul']   = 'Form Edit Buku';
        // untuk mengambil data dari tabel pengarang
        $isi['pengarang'] = $this->db->get('pengarang')->result();
        // untuk mengambil data dari tabel penerbit
        $isi['penerbit'] = $this->db->get('penerbit')->result();
        // meload model buku yg methodnya edit
        $isi['data']    = $this->m_buku->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $isi['content'] = 'buku/tambah_buku';
        $isi['judul'] = 'Form Tambah Buku';
        // untuk membuat kode buku otomatis yang dilakukn di dalam m_buku di function kode_buku
        $isi['kode_buku'] = $this->m_buku->kode_buku();
        // untuk mengambil data dari tabel pengarang
        $isi['pengarang'] = $this->db->get('pengarang')->result();
        // untuk mengambil data dari tabel penerbit
        $isi['penerbit'] = $this->db->get('penerbit')->result();

        // untuk vaidasi nama dan no hp unique jika nama dan no sudah ada maka akan meload halamn ulang
        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'trim|required|is_unique[buku.judul_buku]',['is_unique' => 'Buku ini sudah ada, mohon isi buku yang lain']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_dashboard', $isi);
        } else {
            $data = array(
                'kode_buku'         => $this->input->post('kode_buku'),
                'id_pengarang'      => $this->input->post('id_pengarang'),
                'id_penerbit'       => $this->input->post('id_penerbit'),
                'judul_buku'        => htmlspecialchars($this->input->post('judul_buku', true)),
                'tahun_terbit'      => $this->input->post('tahun_terbit'),
                'jumlah'            => $this->input->post('jumlah')
            );
            $query = $this->db->insert('buku', $data);
            if ($query = true) {
                $this->session->set_flashdata('info', 'Data Berhasil Di Simpan');
                redirect('Buku');
            }
        }
    }

    public function update()
    {
        $id_buku = $this->input->post('id_buku');
        $data = array(
            'id_buku'       => $this->input->post('id_buku'),
            'kode_buku'     => $this->input->post('kode_buku'),
            'judul_buku'    => $this->input->post('judul_buku'),
            'id_pengarang'  => $this->input->post('id_pengarang'),
            'id_penerbit'   => $this->input->post('id_penerbit'),
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