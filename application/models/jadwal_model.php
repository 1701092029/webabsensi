<?php


class jadwal_model extends CI_model
{
    public function getAllJadwal()
    {
        //cara1
        // $query = $this->db->get('berita');
        // return $query->result_array();

        //cara 2
        // return $this->db->get('tjadwal')->result_array();
        //memanggil smua isi data

        $sql = "SELECT tkelas.nama_kelas as namkel , tjadwal.*
        FROM tkelas,tjadwal WHERE tkelas.id_kelas = tjadwal.kelas";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
