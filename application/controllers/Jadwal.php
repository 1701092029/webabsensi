<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); //membuat sebuah validation
        // $this->load->helper(array('form', 'url'));
        $this->load->model('jadwal_model');
    }
    public function index()
    {


        $data['title'] = 'Jadwal';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['jadwal'] = $this->jadwal_model->getAllJadwal();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jadwal/index', $data); //memanggil class yaitu index yang terdapat pada folder user
        $this->load->view('templates/footer');
    }


    public function tambah()
    {
        $data['title'] = 'Jadwal';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['list_kelas'] = $this->db->get('tkelas')->result_array();
        $data['list_hari'] = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];


        $this->form_validation->set_rules('mata_kuliah', 'mata_kuliah', 'required', [
            'required' => 'mata_kuliah belum diisi !!'
        ]);

        $this->form_validation->set_rules('ruang_kelas', 'ruang_kelas', 'required', [
            'required' => 'ruang_kelas belum diisi !!'
        ]);
        $this->form_validation->set_rules('kelas', 'kelas', 'required', [
            'required' => 'kelas belum diisi !!'
        ]);

        $this->form_validation->set_rules('hari', 'hari', 'required', [
            'required' => 'kelas belum diisi !!'
        ]);
        $this->form_validation->set_rules('jam_masuk', 'jam_masuk', 'required', [
            'required' => 'jam_masuk belum diisi !!'
        ]);

        $this->form_validation->set_rules('jam_keluar', 'jam_keluar', 'required', [
            'required' => 'jam_keluar belum diisi !!'
        ]);

        $id_jadwal = $this->input->post('id_jadwal', true);
        $mata_kuliah = $this->input->post('mata_kuliah', true);
        $ruang_kelas = $this->input->post('ruang_kelas', true);
        $kelas = $this->input->post('kelas', true);
        $hari = $this->input->post('hari', true);
        $jam_masuk = $this->input->post('jam_masuk', true);
        $jam_keluar = $this->input->post('jam_keluar', true);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('jadwal/tambah', $data);
            $this->load->view('templates/footer');
        } else {


            $data = array(
                'id_jadwal' => $id_jadwal,
                'mata_kuliah' => $mata_kuliah,
                'ruang_kelas' => $ruang_kelas,
                'kelas' => $kelas,
                'hari' => $hari,
                'jam_masuk' => $jam_masuk,
                'jam_keluar' => $jam_keluar,
                'status_kelas' => 0,
            );

            $this->db->insert('tjadwal', $data);
            $this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
            redirect('jadwal/index');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Jadwal';
        $data['jadwal'] = $this->db->get_where('tjadwal', ['id_jadwal' => $id])->row_array();
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['list_kelas'] = $this->db->get('tkelas')->result_array();
        $data['list_hari'] = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $data['status'] = [0, 1];



        $this->form_validation->set_rules('id_jadwal', 'id_jadwal', 'required', [
            'required' => 'id_jadwal belum diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('jadwal/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_jadwal" => $this->input->post('id_jadwal', true),
                "mata_kuliah" => $this->input->post('mata_kuliah', true),
                "ruang_kelas" => $this->input->post('ruang_kelas', true),
                "kelas" => $this->input->post('kelas', true),
                "hari" => $this->input->post('hari', true),
                "jam_masuk" => $this->input->post('jam_masuk', true),
                "jam_keluar" => $this->input->post('jam_keluar', true),
                "status_kelas" => $this->input->post('status_kelas', true),
            ];

            $this->db->where('id_jadwal', $id);
            $this->db->update('tjadwal', $data);


            // $this->Berita_model->editDataBerita();
            $this->session->set_flashdata('flash', 'Berhasil diedit');
            redirect('jadwal/index');
        }
    }

    public function hapus($id)
    {

        $this->db->where('id_jadwal', $id);
        $this->db->delete('tjadwal');
        $this->session->set_flashdata('flash', ' Berhasil Dihapus');
        redirect('jadwal/index');
    }
}
