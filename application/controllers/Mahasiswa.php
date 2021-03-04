<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); //membuat sebuah validation
        // $this->load->helper(array('form', 'url'));
        $this->load->model('mahasiswa_model');
    }


    public function index()
    {

        $data['title'] = 'Data Mahasiswa';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['mahasiswa'] = $this->mahasiswa_model->getAllMahasiswa();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/index', $data); //memanggil class yaitu index yang terdapat pada folder user
        $this->load->view('templates/footer');
    }
    public function ketambah()
    {

        $this->load->view('mahasiswa/coba1'); //memanggil class yaitu index yang terdapat pada folder user

    }
    public function cobatambah()
    {
        // $no_bp = $this->input->post('no_bp', true);
        // $nama = $this->input->post('judul', true);
        // $kelas = $this->input->post('deksripsi', true);

        $nama = $_POST["judul"];
        $kelas = $_POST["deksripsi"];
        var_dump($nama);
        die;

        $data = array(
            'nama' => $nama,
            'kelas' => $kelas,
        );

        $this->db->insert('tdata_mahasiswa', $data);
        $this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
        redirect('mahasiswa/index');
    }


    public function tambah()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kategori_kelas'] = $this->db->get('tkelas')->result_array();

        $this->form_validation->set_rules('no_bp', 'no_bp', 'required', [
            'required' => 'no_bp belum diisi !!'
        ]);

        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'no_bp belum diisi !!'
        ]);

        $this->form_validation->set_rules('kelas', 'kelas', 'required', [
            'required' => 'kelas belum diisi !!'
        ]);

        $no_bp = $this->input->post('no_bp', true);
        $nama = $this->input->post('nama', true);
        $kelas = $this->input->post('kelas', true);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/tambah', $data);
            $this->load->view('templates/footer');
        } else {

            $data = array(
                'no_bp' => $no_bp,
                'nama' => $nama,
                'kelas' => $kelas,
            );

            $this->db->insert('tdata_mahasiswa', $data);
            $this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
            redirect('mahasiswa/index');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Data Mahasiswa';
        $data['mahasiswa'] = $this->db->get_where('tdata_mahasiswa', ['no_bp' => $id])->row_array();
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('no_bp', 'no_bp', 'required', [
            'required' => 'no_bp belum diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "no_bp" => $this->input->post('no_bp', true),
                "nama" => $this->input->post('nama', true),
                "kelas" => $this->input->post('kelas', true),
            ];

            $this->db->where('no_bp', $id);
            $this->db->update('tdata_mahasiswa', $data);


            // $this->Berita_model->editDataBerita();
            $this->session->set_flashdata('flash', 'Berhasil diedit');
            redirect('mahasiswa/index');
        }
    }

    public function hapus($id)
    {

        $this->db->where('no_bp', $id);
        $this->db->delete('tdata_mahasiswa');
        $this->session->set_flashdata('flash', ' Berhasil Dihapus');
        redirect('mahasiswa/index');
    }
}
