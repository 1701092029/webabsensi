<!-- Begin Page Content -->
<div class="container-fluid">





    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Mahasiswa</h6>
                    </div>
                    <div class="card-body">


                        <!-- //menampilkan pesan error yang sudah diset tadi controler (dihapus karena pake required)-->

                        <!-- ///menmapilkan input kode otomatis -->


                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="judul">No Bp</label>
                                <input type="text" name="no_bp" class="form-control" id="no_bp" value="<?= $mahasiswa['no_bp'] ?>">
                                <?= form_error('no_bp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="judul">Nama </label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $mahasiswa['nama'] ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="judul"> Kelas </label>
                                <input type="text" name="kelas" class="form-control" id="kelas" value="<?= $mahasiswa['kelas'] ?>">
                                <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <button type="submit" class="btn btn-primary float-right" name="tambah">simpan</button>
                            <a href="<?= base_url(); ?>mahasiswa" class="btn btn-danger float-right mr-3">batal</a>

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


<!-- //cuman menmpilkan isi combo box ke input text  -->