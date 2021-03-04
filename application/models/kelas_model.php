<?php


class kelas_model extends CI_model
{
    public function getAllKelas()
    {
        //cara1
        // $query = $this->db->get('berita');
        // return $query->result_array();

        //cara 2
        return $this->db->get('tkelas')->result_array();
        //memanggil smua isi data
    }
}
