<?php


class absensi_model extends CI_model
{
    public function getabsensi($id, $hari)
    {

        $sql = "SELECT tkelas.nama_kelas as namkel , tjadwal.mata_kuliah as makul, tjadwal.ruang_kelas as ruangan, tjadwal.jam_masuk as jammsk, tjadwal.jam_keluar as jamklr, tdata_mahasiswa.*
        FROM tkelas,tdata_mahasiswa, tjadwal WHERE tkelas.id_kelas = tdata_mahasiswa.kelas AND tkelas.id_kelas = tjadwal.kelas AND tdata_mahasiswa.no_bp='$id' AND tjadwal.hari='$hari' AND tjadwal.status_kelas=1";
        $result = $this->db->query($sql);

        return $result->result_array();
    }

    public function getcekkeluar($id, $tgl, $makulak)
    {
        // $sql = "SELECT * FROM absensi WHERE  no_bp='$id' AND tanggal='$tgl' AND status_hadir=''";
        $sql = "SELECT * FROM absensi WHERE  no_bp='$id' AND tanggal='$tgl' AND matakuliah='$makulak'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getcekmakulaktif($id, $tgl)
    {
        // $sql = "SELECT * FROM absensi WHERE  no_bp='$id' AND tanggal='$tgl' AND status_hadir=''";
        $sql = "SELECT tjadwal.mata_kuliah as makulaktif
        FROM tkelas,tdata_mahasiswa, tjadwal,absensi WHERE absensi.no_bp=tdata_mahasiswa.no_bp AND tkelas.id_kelas = tdata_mahasiswa.kelas AND tkelas.id_kelas = tjadwal.kelas AND tdata_mahasiswa.no_bp='$id' AND absensi.tanggal='$tgl' AND tjadwal.status_kelas=1";
        $result = $this->db->query($sql);
        return $result->row()->makulaktif;
    }

    public function getAllAbsen()
    {
        // $sql = "SELECT * FROM absensi WHERE  no_bp='$id' AND tanggal='$tgl' AND status_hadir=''";
        $sql = "SELECT * FROM absensi";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
