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
                        <!-- <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> -->
                        <a href="<?= base_url('gaji');?>" class="btn btn-primary"><i class="fas fa-backward"></i> Kembali </a>
                        <p>*Data akan Terisi Otomatis ketika jabatan & tunjangan sudah diisi</p>
                        <br>
                        
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nip</th>
                                    <th>Nama</th>
                                    <th>Bulan</th>
                                    <th>Absensi</th>
                                    <th>Gaji Pokok</th>
                                    <th>Tunjangan_Karyawan</th>
                                    <th>Tunjangan_Istri</th>
                                    <th>Tunjangan_Anak</th>
                                    <th>Gaji Bersih</th>
                                    <th>Slip</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $start = 0;
                                foreach ($gaji_data as $gaji) {
                            ?>
                              <tr>
                                <td><?php echo ++$start ?></td>
                                <td><?php echo $gaji->nip ?></td>
                                <td><?php echo $gaji->nama ?></td>
                                <?php foreach ($absen as $abs) {?>
                                <td><?php echo $abs->tahun_bulan ?></td>
                                <td><?php echo $abs->jumlah_hadir ?></td>
                                <?php }?>
                                <td><?php echo 'Rp. '.number_format($gaji->gaji_pokok)  ?>
                                <td><?php echo 'Rp. '.number_format($gaji->biaya)  ?>
                                <td><?php echo number_format($gaji->status*$gaji->st) ?></td>
                                <td><?php echo number_format($gaji->anak * $gaji->an)?></td>
                                <td><b><?php echo 'Rp. '.number_format( ($abs->jumlah_hadir * $gaji->gaji_pokok) + $gaji->biaya + ($gaji->status*$gaji->st)+ ($gaji->anak * $gaji->an) ) ?></b>
                                </td>
                                 <td>
                                    <div class="text-center">
                                        <button type="button" data-toggle="modal" data-target="#<?php echo 'slip'.$gaji->nip  ?>">
                                            <i class="fas fa-image" style="font-size: 25px"></i>
                                        </button> 
                                    </div>
                                </td>

                                <!-- <td style="text-align:center" width="200px">
                                <?php 
                                echo anchor(site_url('gaji/read/'.$gaji->id),'Read'); 
                                echo ' | '; 
                                echo anchor(site_url('gaji/update/'.$gaji->id),'Update'); 
                                echo ' | '; 
                                echo anchor(site_url('gaji/delete/'.$gaji->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                ?>
                                </td> -->
                              </tr>
                            <?php }  ?>
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


    <?php foreach ($gaji_data as $gaji) { ?>
        <div class="text-center">
            <div class="modal fade" id="<?php echo 'slip'.$gaji->nip?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="color-line"></div>
                        <div class="modal-header text-center">
                            <h4 class="modal-title">Slip Gaji <b><?php echo $gaji->nama ?></b></h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">
                                <img alt="<?php echo $gaji->nama ?>" src="<?php echo base_url('/uploads/photo/karyawan/').$gaji->slip?>" >
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php } ?>