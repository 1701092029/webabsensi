<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); //membuat sebuah validation
        $this->load->helper(array('form', 'url'));
        $this->load->model('absensi_model');
        $this->load->model('mahasiswa_model');
    }
    public function index()
    {

        $data['title'] = 'Absensi';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absensi/index', $data);
        $this->load->view('templates/footer');
    }

    public function absensi()
    {
        $no_bp = $this->input->post('nim', true);
        $hari = $this->input->post('hari', true);
        $waktu = $this->input->post('waktu', true);

        //aktifkan kalau sudah selsai semua(menghilangkan input type)
        // date_default_timezone_set('Asia/Jakarta');
        // $waktu =  date('H:i:s');


        // var_dump($waktu);
        // die;

        $dataabsen = $this->absensi_model->getabsensi($no_bp, $hari);



        //cekapakah sudah isi absen masuk atau suda
        date_default_timezone_set('Asia/Jakarta');
        $date = new DateTime('now');
        $cektgl = $date->format('yy-m-d');
        $cekmakulaktif = $this->absensi_model->getcekmakulaktif($no_bp, $cektgl);
        //nanti data makul yang sedang aktif dimasukan ke datacekkeluar
        $datacekkeluar = $this->absensi_model->getcekkeluar($no_bp, $cektgl, $cekmakulaktif);

        foreach ($datacekkeluar as $cekdata) {
            $id_absensi = $cekdata['id_absensi'];
        }

        if ($datacekkeluar == null) {
            if ($dataabsen == null) {
                // echo 'data kosong';
                redirect('absensi');
            } else {

                foreach ($dataabsen as $dataabsen) {
                    // var_dump($dataabsen['jammsk']);
                    // die;
                    if ($waktu >= $dataabsen['jammsk']) {
                        // echo 'telat';
                        redirect('absensi');
                    } else {

                        $nama = $dataabsen['nama'];

                        $status = 'masuk';
                        $ruang = $dataabsen['ruangan'];
                        date_default_timezone_set('Asia/Jakarta');
                        $date = new DateTime('now');
                        $tanggal = $date->format('yy-m-d');
                        $makul = $dataabsen['makul'];
                    }
                }



                // echo 'data benar';
            }
            $data = array(
                'no_bp' => $no_bp,
                'nama' => $nama,
                'status_hadir' => $status,
                'ruang_kelas' => $ruang,
                'tanggal' => $tanggal,
                'matakuliah' => $makul
            );

            $this->db->insert('absensi', $data);
            $this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
            redirect('mahasiswa/index');
        } else {

            foreach ($dataabsen as $dataabsen) {
                // var_dump($dataabsen['jammsk']);
                // die;
                if ($waktu <= $dataabsen['jamklr']) {
                    // echo 'telat';
                    redirect('absensi');
                } else {
                    $status = 'Complate';
                }
            }



            // echo 'data benar';
        }
        $data = array(
            'status_hadir' => $status,
        );
        $this->db->where('id_absensi', $id_absensi);
        $this->db->update('absensi', $data);
        redirect('mahasiswa/index');
    }

    public function list()
    {

        $data['title'] = 'list absen';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['absen'] = $this->absensi_model->getAllAbsen();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absensi/listabsen', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id)
    {
        $data['title'] = 'list absen';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['status'] = $this->db->get_where('absensi', ['id_absensi' => $id])->row_array();
        $data['list_status'] = ['Complate', 'alfa', 'sakit', 'izin'];




        $this->form_validation->set_rules('status_hadir', 'status_hadir', 'required', [
            'required' => 'status_hadir belum diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('absensi/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "status_hadir" => $this->input->post('status_hadir', true),
            ];

            $this->db->where('id_absensi', $id);
            $this->db->update('absensi', $data);


            // $this->Berita_model->editDataBerita();
            $this->session->set_flashdata('flash', 'Berhasil diedit');
            redirect('absensi/list');
        }
    }
    public function hapus($id)
    {

        $this->db->where('id_absensi', $id);
        $this->db->delete('absensi');
        $this->session->set_flashdata('flash', ' Berhasil Dihapus');
        redirect('absensi/list');
    }


    // public function tambah()
    // {
    //     $data['title'] = 'list absen';
    //     $data['user'] =  $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();


    //     $this->form_validation->set_rules('no_bp', 'no_bp', 'required', [
    //         'required' => 'jam_keluar belum diisi !!'
    //     ]);



    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('absensi/tambah', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         echo 'ayam';
    //     }
    // }
}
