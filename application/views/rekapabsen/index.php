<?php


function nmbulan($angka)
{

    switch ($angka) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rekap Absensi Bulanan</h6>
    </div>
    <div class="card-body">

        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="div row mt-3">
                <div class="col md 6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Absensi <?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <form action="" method="post" class="form-inline text-gray-800">

            <div class="form-group">
                &nbsp;Tahun : &nbsp;

                <select name="th" id="th" class="form-control mb-3">
                    <option value="">- PILIH -</option>
                    <?php
                    foreach ($list_th as $t) {
                        if ($thn == $t['th']) {
                    ?>
                            <option selected value="<?php echo $t['th'];  ?>"><?php echo $t['th']; ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?php echo $t['th']; ?>"><?php echo $t['th']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">

                &nbsp;Bulan : &nbsp;

                <select name="bln" id="bln" class="form-control mb-3">
                    <option value="">- PILIH -</option>
                    <?php
                    foreach ($list_bln as $t) {
                        if ($blnnya == $t['bln']) {
                    ?>
                            <option selected value="<?php $t['bln'];  ?>"><?php echo nmbulan($t['bln']); ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?php echo $t['bln']; ?>"><?php echo nmbulan($t['bln']); ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="judul">&nbsp;Kelas :</label>
                <select class="form-control mb-3" name="kelas" id="kelas">
                    <option selected> Pilih Kelas</option>

                    <?php foreach ($list_kelas as $lk) {
                        if ($kelas == $lk['id_kelas']) {
                    ?>
                            <option selected value="<?= $lk['id_kelas'] ?>"><?= $lk['nama_kelas'] ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?= $lk['id_kelas'] ?>"><?= $lk['nama_kelas'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="judul">&nbsp;Mata kuliah :</label>
                <select class="form-control mb-3" name="makul" id="makul">
                    <option selected>Pilih Mata Kuliah</option>

                    <?php foreach ($list_makul as $mk) {
                        if ($makul == $lk['id_kelas']) {
                    ?>
                            <option selected value="<?= $mk['mata_kuliah'] ?>"><?= $mk['mata_kuliah'] ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?= $mk['mata_kuliah'] ?>"><?= $mk['mata_kuliah'] ?></option>
                    <?php
                        }
                    }
                    ?>

                </select>
                &nbsp;<button type="submit" class="btn btn-primary mb-3"><i class="fa fa-search"></i> Cari</button>

                <!-- <?php if ($blnnya == '' || $thn == '' || $kelas == '' || $makul == '') { ?>
                    &nbsp;<a target="_blank" href="" class="btn btn-danger mb-3" hidden><i class="fa fa-print"></i> Cetak</a>
                <?php } else { ?>
                    &nbsp;<a target="_blank" href="<?= base_url(); ?>c_laporan/cetak_laptrans/<?php echo $thn  ?>/<?php echo $blnnya  ?>" class="btn btn-danger mb-3"><i class="fa fa-print"></i> Cetak</a>
                <?php } ?> -->


        </form>
        <div class="table-responsive">
            <table class="table table-hover text-gray-800" id="" width="100%" cellspacing="0">
                <thead class="border-5">
                    <tr class="table-primary ">
                    <tr>
                        <th valign="center">#</th>
                        <th valign="center">No Bp</th>
                        <th valign="center">Nama</th>
                        <th valign="center">Status Hadir</th>
                        <th valign="center">Ruang Kelas</th>
                        <th valign="center">Tanggal</th>
                        <th valign="center">Mata Kuliah</th>
                        <th valign="center">Aksi</th>
                    <tr>
                </thead>
                <tbody>

                    <?php $start = 1;

                    ?>
                    <?php
                    if ($blnnya == '' || $thn == '' || $kelas == '' || $makul == '') {
                        echo "<tr><td colspan='9' align='center'>SILAHKAN PILIH TAHUN, BULAN, KELAS DAN MAKUL  SECARA LENGKAP</td></tr>";
                    } else {
                    ?>
                        <?php foreach ($rekapabsen as $trans) : ?>
                            <tr>
                                <td><?= $start++; ?></td>
                                <td><?= $trans['no_bp']; ?></td>
                                <td><?= $trans['nama']; ?></td>
                                <td><?= $trans['status_hadir']; ?></td>
                                <td> <?= $trans['ruang_kelas'] ?></td>
                                <td><?= $trans['tanggal']; ?></td>
                                <td><?= $trans['matakuliah']; ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php } ?>
                </tbody>
            </table>

        </div>

    </div>

</div>
</div>
</div>