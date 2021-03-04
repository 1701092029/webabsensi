<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Ubah Status Kehadiran</h6>
                    </div>
                    <div class="card-body">

                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="judul">Status hadir</label>
                                <select class="form-control" id="status_hadir" name="status_hadir">
                                    <?php foreach ($list_status as $st) : ?>
                                        <?php if ($status['status_hadir'] == $st) : ?>
                                            <option value="<?= $st; ?>" selected> <?= $st; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $st; ?>"> <?= $st; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('status_hadir', '<small class="text-danger pl-3">', '</small>'); ?>
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