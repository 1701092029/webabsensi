<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        //membuat nama pada pencarian
        $data['title'] = 'My Profile';

        //mengambil data dari user berdasarkan email yang ada disession

        $data['user'] = $this->db->get_where('user', ['email'
        => $this->session->userdata('email')])->row_array();




        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data); //memanggil class yaitu index yang terdapat pada folder user
        $this->load->view('templates/footer');


        //echo 'Selamat datang' . $data['user']['name'];
        //titik berfugsi untuk mengabungkan 
    }
}
