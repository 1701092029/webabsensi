<!-- Begin Page Content -->
<div class="container-fluid">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Ubah Jadwal</h6>
                    </div>
                    <div class="card-body">

                        <!-- //menampilkan pesan error yang sudah diset tadi controler (dihapus karena pake required)-->

                        <!-- ///menmapilkan input kode otomatis -->

                        <form action="" method="POST">

                            <div class="form-group">
                                <label for="judul">Status Kelas</label>
                                <select class="form-control" id="status_kelas" name="status_kelas">
                                    <?php foreach ($status as $st) : ?>
                                        <?php if ($jadwal['status_kelas'] == $st) : ?>
                                            <option value="<?= $st ?>" selected>
                                                <?php if ($jadwal['status_kelas'] == 1) : ?>
                                                    <span class="badge badge-primary">aktif</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger">tidak aktif</span>
                                                <?php endif; ?>
                                            </option>
                                        <?php else : ?>
                                            <option value="<?= $st; ?>">
                                                <?php if (!$jadwal['status_kelas'] == 1) : ?>
                                                    <span class="badge badge-primary">aktif</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger">tidak aktif</span>
                                                <?php endif; ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('hari', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="judul">Id Jadwal</label>
                                <input type="text" name="id_jadwal" class="form-control" id="id_kelas" value=" <?= $jadwal['id_jadwal'] ?>" readonly>
                                <?= form_error('id_jadwal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="judul">Mata Kuliah </label>
                                <input type="text" name="mata_kuliah" class="form-control" id="mata_kuliah" value="<?= $jadwal['mata_kuliah'] ?>">
                                <?= form_error('mata_kuliah', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>


                            <div class="form-group">
                                <label for="judul">Ruang Kelas </label>
                                <input type="text" name="ruang_kelas" class="form-control" id="ruang_kelas" value="<?= $jadwal['ruang_kelas'] ?>">

                                <?= form_error('ruang_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class=" form-group">
                                <label for="kelas">Kelas</label>
                                <select class="form-control" id="kelas" name="kelas">
                                    <?php foreach ($list_kelas as $lk) : ?>
                                        <?php if ($lk['id_kelas'] == $jadwal['kelas']) : ?>
                                            <option value="<?= $lk['id_kelas']; ?>" selected> <?= $lk['nama_kelas']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $lk['id_kelas']; ?>"> <?= $lk['nama_kelas']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="judul">Hari</label>
                                <select class="custom-select" name="hari" id="hari">
                                    <option selected>Pilih Hari</option>
                                    <?php foreach ($list_hari as $lh) : ?>
                                        <?php if ($lh == $jadwal['hari']) : ?>
                                            <option value="<?= $jadwal['hari']; ?>" selected> <?= $jadwal['hari']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $lh ?>"> <?= $lh; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('hari', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="judul">Jam Masuk</label>
                                <input type="text" name="jam_masuk" class="form-control" id="jammasuk" value="<?= $jadwal['jam_masuk'] ?>">

                                <?= form_error('jam_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="judul">Jam Keluar </label>
                                <input type="text" name="jam_keluar" class="form-control" id="jamkeluar" value="<?= $jadwal['jam_keluar'] ?>">

                                <?= form_error('jam_keluar', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>






                            <button type="submit" class="btn btn-primary float-right" name="tambah">simpan</button>
                            <a href="<?= base_url(); ?>jadwal" class="btn btn-danger float-right mr-3">batal</a>

                        </form>

                    </div>
                </div>




            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<script>
    $('#jammasuk').timepicker({
        uiLibrary: 'bootstrap4'
    });

    $('#jamkeluar').timepicker({
        uiLibrary: 'bootstrap4'
    });
</script>