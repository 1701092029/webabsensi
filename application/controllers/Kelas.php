<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); //membuat sebuah validation
        // $this->load->helper(array('form', 'url'));
        $this->load->model('kelas_model');
    }
    public function index()
    {


        $data['title'] = 'Data Kelas';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->kelas_model->getAllKelas();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelas/index', $data); //memanggil class yaitu index yang terdapat pada folder user
        $this->load->view('templates/footer');
    }


    public function tambah()
    {
        $data['title'] = 'Data Kelas';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'required', [
            'required' => 'nama belum diisi !!'
        ]);



        $nama_kelas = $this->input->post('nama_kelas', true);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelas/tambah', $data);
            $this->load->view('templates/footer');
        } else {

            $data = array(

                'nama_kelas' => $nama_kelas,

            );

            $this->db->insert('tkelas', $data);
            $this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
            redirect('kelas/index');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Data Kelas';
        $data['kelas'] = $this->db->get_where('tkelas', ['id_kelas' => $id])->row_array();
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'required', [
            'required' => 'id kelas belum diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelas/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                "nama_kelas" => $this->input->post('nama_kelas', true),

            ];

            $this->db->where('id_kelas', $id);
            $this->db->update('tkelas', $data);


            // $this->Berita_model->editDataBerita();
            $this->session->set_flashdata('flash', 'Berhasil diedit');
            redirect('kelas/index');
        }
    }

    public function hapus($id)
    {

        $this->db->where('id_kelas', $id);
        $this->db->delete('tkelas');
        $this->session->set_flashdata('flash', ' Berhasil Dihapus');
        redirect('kelas/index');
    }
}
