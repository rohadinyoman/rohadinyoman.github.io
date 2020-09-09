<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Absensi Read</h2>
        <table class="table">
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Jumlah Hadir</td><td><?php echo $jumlah_hadir; ?></td></tr>
	    <tr><td>Jumlah Alpa</td><td><?php echo $jumlah_alpa; ?></td></tr>
	    <tr><td>Jumlah Sakit</td><td><?php echo $jumlah_sakit; ?></td></tr>
	    <tr><td>Jumlah Izin</td><td><?php echo $jumlah_izin; ?></td></tr>
	    <tr><td>Jumlah Cuti</td><td><?php echo $jumlah_cuti; ?></td></tr>
	    <tr><td>Nip</td><td><?php echo $nip; ?></td></tr>
	    <tr><td>Nama Karyawan</td><td><?php echo $nama_karyawan; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Jam Masuk</td><td><?php echo $jam_masuk; ?></td></tr>
	    <tr><td>Jam Keluar</td><td><?php echo $jam_keluar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('absensi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>