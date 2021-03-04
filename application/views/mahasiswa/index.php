<!-- Nav Item - Pages Collapse Menu -->




<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
    </div>
    <div class="card-body">


        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('messege'); ?>
        <a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary mb-3">Tambah Menu </a>
        <div class="table-responsive text-gray-900">
            <table class="table table-hover" id="dataTable" width="100%">
                <thead>
                    <tr class="text-gray-900">
                        <th scope="col">#</th>
                        <th scope="col">No Bp</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody class="text-gray-900">
                    <?php $i = 1 ?>
                    <?php foreach ($mahasiswa as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $m['no_bp']; ?></td>
                            <td><?= $m['nama']; ?></td>
                            <td><?= $m['namkel']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>mahasiswa/edit/<?= $m['no_bp']; ?>" class=" float-left mb-2 btn btn-success btn-circle mr-1"> <i class="far fa-edit"></i></a>

                                <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $m['no_bp']; ?>" class=" float-left mb-2 btn btn-danger btn-circle" onclick="return confirm('Yakin ingin menghapus data?');"> <i class="fas fa-trash"></i></a>

                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- /.container-fluid -->

    </div>
</div>
<!-- End of Main Content -->






</div>