<!-- Main Wrapper -->
<div id="wrapper">

    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <a class="small-header-action" href="">
                    <div class="clip-header">
                        <i class="fa fa-arrow-up"></i>
                    </div>
                </a>

                <div id="hbreadcrumb" class="pull-right m-t-lg">
                    <ol class="hbreadcrumb breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Dashboard</a></li>
                        <li>
                            <span><?php echo $judul_halaman; ?></span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    <?php echo $judul_halaman; ?>
                </h2>
            </div>
        </div>
    </div>


    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-body">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        <br>
                        <a href="<?= base_url('absensi');?>" class="btn btn-primary"><i class="fas fa-backward"></i> Kembali </a>
                        <div class="pull-right">
                            *Gunakan fitur 'search' untuk memfilter data
                        </div>
                        <br><br>
                        
                        
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example2">
                            <thead>
                                <tr>
                                    <th width="">No</th>
                                    <th>Tanggal</th>
                                    <!-- <th>Jumlah Hadir</th> -->
                                   <!--  <th>Jumlah Alpa</th>
                                    <th>Jumlah Sakit</th>
                                    <th>Jumlah Izin</th>
                                    <th>Jumlah Cuti</th> -->
                                    <th>Nip</th>
                                    <th>Nama Karyawan</th>
                                    <th>Keterangan</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $start = 0;
                                    foreach ($absensi_data as $absensi)
                                    {
                                ?>
                               
                               
                                    <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo date('d-M-Y', strtotime( $absensi->tanggal)) ?></td>
                                    <!-- <td><?php echo count($jumlah_hadir) ?></td> -->
                                    <!-- <td><?php echo $absensi->jumlah_alpa ?></td>
                                    <td><?php echo $absensi->jumlah_sakit ?></td>
                                    <td><?php echo $absensi->jumlah_izin ?></td>
                                    <td><?php echo $absensi->jumlah_cuti ?></td> -->
                                    <td><?php echo $absensi->nip ?></td>
                                    <td><?php echo $absensi->nama_karyawan ?></td>
                                    <td><?php echo $absensi->keterangan ?></td>
                                    <td><?php echo $absensi->jam_masuk ?></td>
                                    <td><?php echo $absensi->jam_keluar ?></td>
                                    <td style="text-align:center" width="100px">
                                    <?php 
                                       
                                        echo ' ';
                                        echo anchor(site_url('absensi/update/'.$absensi->id),' Ubah ','<a class="badge badge-success"','</a>'); 
                                        
                                        ?>
                                    </td>
                                </tr>
                          
                                
                                <?php }   ?>
                                <!-- <tr>
                                    <td colspan="8">wkwkwkwkwkw</td>
                                </tr> -->
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            SIMPEG - Sistem Informasi Pegawai
        </span>
        <?php echo date('Y') ?>
    </footer>

</div>
