<!-- Nav Item - Pages Collapse Menu -->
<?php
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
); ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="jamServer.js"></script>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
    </div>
    <div class="card-body">
        <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->
        <?= $this->session->flashdata('messege'); ?>

        <!-- date('l, d-m-Y'); -->
        <?php date_default_timezone_set('Asia/Jakarta');
        $date = new DateTime('now');
        $tanggal = $date->format('d-m-Y');
        $day = date('D', strtotime($tanggal));
        $hari = $dayList[$day];
        $tanggal = $date->format('d-m-Y');
        ?>
        <h3>
            <p class="text-center mb-0"> <?= $hari ?></p>
        </h3>
        <p class="text-center mb-5"><?= $tanggal ?> / <span name="waktu " id="jamServer"><?php date_default_timezone_set('Asia/Jakarta');
                                                                                            echo  date('H:i:s'); ?></span>
        </p>




        <form action="<?= base_url('absensi/absensi'); ?>" method="POST">
            <div class="form-group">
                <center><label for="judul">Masukan NIM </label></center>
                <input type="text" name="nim" class="form-control" id="nim" value="">
                <?= form_error('ruang_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <input type="text" name="waktu" class="form-control" id="waktu" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                        $date = new DateTime('now');
                                                                                        echo $date->format('H:i:s'); ?>">
                <?= form_error('ruang_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <?php
            $dayList = array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'Sabtu'
            );

            date_default_timezone_set('Asia/Jakarta');
            $date = new DateTime('now');
            // $date->format('d-m-Y');
            ?>

            <div class="form-group">

                <input type="text" name="hari" class="form-control" id="hari" value="<?php $tanggal = $date->format('d-m-Y');
                                                                                        $day = date('D', strtotime($tanggal));
                                                                                        echo $dayList[$day]; ?>">
                <?= form_error('ruang_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary float-right" name="tambah">tambah data</button>
        </form>
        <!-- /.container-fluid -->

    </div>
</div>
<!-- End of Main Content -->










</div>

<script type="text/javascript">
    var serverClock = jQuery("#jamServer");
    if (serverClock.length > 0) {
        showServerTime(serverClock, serverClock.text());
    }

    function showServerTime(obj, time) {
        var parts = time.split(":"),
            newTime = new Date();

        newTime.setHours(parseInt(parts[0], 10));
        newTime.setMinutes(parseInt(parts[1], 10));
        newTime.setSeconds(parseInt(parts[2], 10));

        var timeDifference = new Date().getTime() - newTime.getTime();

        var methods = {
            displayTime: function() {
                var now = new Date(new Date().getTime() - timeDifference);
                obj.text([
                    methods.leadZeros(now.getHours(), 2),
                    methods.leadZeros(now.getMinutes(), 2),
                    methods.leadZeros(now.getSeconds(), 2)
                ].join(":"));
                setTimeout(methods.displayTime, 500);
            },

            leadZeros: function(time, width) {
                while (String(time).length < width) {
                    time = "0" + time;
                }
                return time;
            }
        }
        methods.displayTime();
    }
</script>