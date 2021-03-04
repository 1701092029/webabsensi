<?php


class mahasiswa_model extends CI_model
{
    public function getAllMahasiswa()
    {
        //cara1
        // $query = $this->db->get('berita');
        // return $query->result_array();

        //cara 2
        // return $this->db->get('tdata_mahasiswa')->result_array();
        //memanggil smua isi data


        $sql = "SELECT tkelas.nama_kelas as namkel , tdata_mahasiswa.*
        FROM tkelas,tdata_mahasiswa WHERE tkelas.id_kelas = tdata_mahasiswa.kelas";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
