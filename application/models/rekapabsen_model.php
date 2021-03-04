<?php


class rekapabsen_model extends CI_model
{
    public function getAlllaporan($tgl1, $tgl2, $kelas, $makul)
    {

        // $query = "SELECT transaksi.*, history_trans.pemasukan as spemasukan,history_trans.pengeluaran as spengeluaran FROM transaksi,history_trans WHERE transaksi.id_trans = history_trans.id_trans and tanggal between $tgl1 and $tgl2;
        // return $this->db->query($query)->result_array();

        $sql = "SELECT absensi.*
        FROM tkelas,tdata_mahasiswa, tjadwal,absensi WHERE absensi.no_bp=tdata_mahasiswa.no_bp AND tkelas.id_kelas = tdata_mahasiswa.kelas AND tkelas.id_kelas = tjadwal.kelas  AND absensi.tanggal between '$tgl1' and '$tgl2'
        AND tkelas.id_kelas='$kelas' AND absensi.matakuliah='$makul' group by nama ";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getTahun()
    {
        $this->db->select('year(tanggal) as th');
        $this->db->from('absensi');
        $this->db->group_by('year(tanggal)');
        return $this->db->get()->result_array();
    }
    public function getBln()
    {
        $this->db->select('month(tanggal) as bln');
        $this->db->from('absensi');
        $this->db->group_by('month(tanggal)');
        return $this->db->get()->result_array();
    }
    public function getkelas()
    {
        $sql = "SELECT *
        FROM tkelas";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getmakul()
    {
        $sql = "SELECT * FROM tjadwal group by mata_kuliah";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
