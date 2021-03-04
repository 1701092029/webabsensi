<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
    </div>
    <div class="card-body">


        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('messege'); ?>
        <a href="<?= base_url(); ?>kelas/tambah" class="btn btn-primary mb-3">Tambah Kelas </a>
        <div class="table-responsive text-gray-900">
            <table class="table table-hover" id="dataTable" width="100%">
                <thead>
                    <tr class="text-gray-900">
                        <th scope="col">#</th>
                        <th scope="col">Id Kelas</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody class="text-gray-900">
                    <?php $i = 1 ?>
                    <?php foreach ($kelas as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $k['id_kelas']; ?></td>
                            <td><?= $k['nama_kelas']; ?></td>

                            <td>
                                <a href=" <?= base_url(); ?>kelas/edit/<?= $k['id_kelas']; ?>" class=" float-left mb-2 btn btn-success btn-circle mr-1"> <i class="far fa-edit"></i></a>

                                <a href="<?= base_url(); ?>kelas/hapus/<?= $k['id_kelas']; ?>" class=" float-left mb-2 btn btn-danger btn-circle" onclick="return confirm('Yakin ingin menghapus data?');"> <i class="fas fa-trash"></i></a>

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