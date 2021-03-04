<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Jadwal</h6>
    </div>
    <div class="card-body">


        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('messege'); ?>
        <a href="<?= base_url(); ?>jadwal/tambah" class="btn btn-primary mb-3">Tambah Jadwal </a>
        <div class="table-responsive text-gray-900">
            <table class="table table-hover" id="dataTable" width="100%">
                <thead>
                    <tr class="text-gray-900">
                        <th scope="col">#</th>
                        <th scope="col">Id Jadwal</th>
                        <th scope="col">Mata Kuliah</th>
                        <th scope="col">Ruang Kelas</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Jam Masuk</th>
                        <th scope="col">Jam Keluar</th>
                        <th scope="col">Status_Kelas</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody class="text-gray-900">
                    <?php $i = 1 ?>
                    <?php foreach ($jadwal as $j) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $j['id_jadwal']; ?></td>
                            <td><?= $j['mata_kuliah']; ?></td>
                            <td><?= $j['ruang_kelas']; ?></td>
                            <td><?= $j['namkel']; ?></td>
                            <td><?= $j['hari']; ?></td>
                            <td><?= $j['jam_masuk']; ?></td>
                            <td><?= $j['jam_keluar']; ?></td>
                            <td>
                                <?php if (!$j['status_kelas'] == 1) : ?>
                                    <span class="badge badge-danger">tidak aktif</span>
                                <?php else : ?>
                                    <span class="badge badge-primary">aktif</span>
                                <?php endif; ?>
                            <td>
                                <a href=" <?= base_url(); ?>jadwal/edit/<?= $j['id_jadwal']; ?>" class=" float-left mb-2 btn btn-success btn-circle mr-1"> <i class="far fa-edit"></i></a>

                                <a href="<?= base_url(); ?>jadwal/hapus/<?= $j['id_jadwal']; ?>" class=" float-left mb-2 btn btn-danger btn-circle" onclick="return confirm('Yakin ingin menghapus data?');"> <i class="fas fa-trash"></i></a>

                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>



</div>