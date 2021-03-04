<?php

class rekapabsen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); //membuat sebuah validation
        // $this->load->helper(array('form', 'url'));
        $this->load->model('rekapabsen_model');
    }
    public function index()
    {

        $thn = $this->input->post('th');
        $bln = $this->input->post('bln');
        $kelas = $this->input->post('kelas');
        $makul = $this->input->post('makul');
        $data['title'] = 'Rekap Absensi';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if (empty($thn) || empty($bln) || empty($kelas) || empty($makul)) {
            $data['list_th'] = $this->rekapabsen_model->getTahun();
            $data['list_bln'] = $this->rekapabsen_model->getBln();
            $data['list_kelas'] = $this->rekapabsen_model->getkelas();
            $data['list_makul'] = $this->rekapabsen_model->getmakul();

            $data['blnnya'] = $bln;
            $data['thn'] = $thn;
            $data['kelas'] = $kelas;
            $data['makul'] = $makul;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('rekapabsen/index', $data);
            $this->load->view('templates/footer');
        } else {

            $data['title'] = 'Rekap Absensi';
            $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['list_th'] = $this->rekapabsen_model->getTahun();
            $data['list_bln'] = $this->rekapabsen_model->getBln();
            $data['list_kelas'] = $this->rekapabsen_model->getkelas();
            $data['list_makul'] = $this->rekapabsen_model->getmakul();
            $data['blnnya'] = $bln;
            $data['thn'] = $thn;
            $data['kelas'] = $kelas;
            $data['makul'] = $makul;


            $thnpilihan1 = $thn . '-' . '' . $bln . '-' . '01';
            $thnpilihan2 = $thn . '-' . '' . $bln . '-' . '31';


            $data['rekapabsen'] = $this->rekapabsen_model->getAlllaporan($thnpilihan1, $thnpilihan2, $kelas, $makul);

            ///

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('rekapabsen/index', $data);
            $this->load->view('templates/footer');
        }
    }
}
