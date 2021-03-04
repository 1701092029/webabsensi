<!-- Begin Page Content -->
<div class="container-fluid">





    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Kelas</h6>
                    </div>
                    <div class="card-body">


                        <!-- //menampilkan pesan error yang sudah diset tadi controler (dihapus karena pake required)-->

                        <!-- ///menmapilkan input kode otomatis -->


                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" name="id_kelas" class="form-control" id="id_kelas" value="" hidden>
                                <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="judul">Nama Kelas </label>
                                <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="">
                                <?= form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
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


<!-- //cuman menmpilkan isi combo box ke input text  -->