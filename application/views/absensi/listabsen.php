<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Absen</h6>
    </div>
    <div class="card-body">


        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('messege'); ?>

        <div class="table-responsive text-gray-900">
            <table class="table table-hover" id="dataTable" width="100%">
                <thead>
                    <tr class="text-gray-900">
                        <th scope="col">#</th>
                        <th scope="col">no bp</th>
                        <th scope="col">nama</th>
                        <th scope="col">Status Hadir</th>
                        <th scope="col">Ruang Kelas</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Mata Kuliah</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody class="text-gray-900">
                    <?php $i = 1 ?>
                    <?php foreach ($absen as $j) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $j['no_bp']; ?></td>
                            <td><?= $j['nama']; ?></td>
                            <td><?= $j['status_hadir']; ?></td>
                            <td><?= $j['ruang_kelas']; ?></td>
                            <td><?= $j['tanggal']; ?></td>
                            <td><?= $j['matakuliah']; ?></td>
                            <td>
                                <a href=" <?= base_url(); ?>absensi/edit/<?= $j['id_absensi']; ?>" class=" float-left mb-2 btn btn-success btn-circle mr-1"> <i class="far fa-edit"></i></a>

                                <a href="<?= base_url(); ?>absensi/hapus/<?= $j['id_absensi']; ?>" class=" float-left mb-2 btn btn-danger btn-circle" onclick="return confirm('Yakin ingin menghapus data?');"> <i class="fas fa-trash"></i></a>

                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>



</div>