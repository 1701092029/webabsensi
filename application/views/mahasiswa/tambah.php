<!-- Begin Page Content -->

<div class="container-fluid">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Mahasiswa</h6>
                    </div>
                    <div class="card-body">


                        <!-- //menampilkan pesan error yang sudah diset tadi controler (dihapus karena pake required)-->

                        <!-- ///menmapilkan input kode otomatis -->
                        <a href="<?= base_url(); ?>mahasiswa/ketambah/">pergi coba </a>

                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="judul">No_Bp</label>
                                <input type="text" name="no_bp" class="form-control" id="no_bp" value="">
                                <?= form_error('no_bp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="judul">Nama </label>
                                <input type="text" name="nama" class="form-control" id="nama" value="">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <!-- <div class="form-group">
                                <label for="judul"> Kelas </label>
                                <input type="text" name="kelas" class="form-control" id="kelas" value="">
                                <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div> -->

                            <div class="form-group">
                                <label for="kategori">Kelas</label>
                                <select class="form-control" id="kategori" name="kelas">
                                    <option value="">-pilih-</option>
                                    <?php foreach ($kategori_kelas as $kt) : ?>
                                        <option value="<?= $kt['id_kelas']; ?>"> <?= $kt['nama_kelas']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <button type="submit" class="btn btn-primary float-right" name="tambah">tambah data</button>
                            <button type="reset" class="btn btn-danger float-right mr-3" name="tambah">reset data</button>
                        </form>

                    </div>
                </div>




            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->