<!-- Begin Page Content -->
<div class="container-fluid">





    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Ubah Kelas</h6>
                    </div>
                    <div class="card-body">


                        <!-- //menampilkan pesan error yang sudah diset tadi controler (dihapus karena pake required)-->

                        <!-- ///menmapilkan input kode otomatis -->


                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="judul">Id Kelas</label>
                                <input type="text" name="id_kelas" class="form-control" id="id_kelas" value=" <?= $kelas['id_kelas'] ?>" readonly>
                                <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="judul">Nama Kelas </label>
                                <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="<?= $kelas['nama_kelas'] ?>">

                                <?= form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>



                            <button type="submit" class="btn btn-primary float-right" name="tambah">simpan</button>
                            <a href="<?= base_url(); ?>kelas" class="btn btn-danger float-right mr-3">batal</a>

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