
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
                        <span style="font-size: 30px"><?php echo $nama; ?></span>
                        <br><br>
                        <div class="table-responsive">
                        <table class="table">
                            <tr><td colspan="2">
                                <?php if($foto): ?>
                                <img width="150" src="<?php echo base_url('/uploads/photo/karyawan/').$foto?>">
                                <?php else: ?>
                                <img width="80" height="105" alt="<?php echo $nama ?>" src="<?php echo base_url('/uploads/photo/karyawan/no_pict.JPG')?>">
                                <?php endif ?>
                            </td></tr>
						    <tr><td>Nip</td><td><?php echo $nip; ?></td></tr>
						    <tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
						    <tr>
                                <td>Jenis Kelamin</td><td>
                                <?php 
                                    if($jk == 0) echo "perempuan";
                                    else  echo "Laki-laki";
                                ?>
                                
                                    
                                </td>
                            </tr>
						    <tr><td>Kota Lahir</td><td><?php echo $kota_lahir; ?></td></tr>
						    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
						    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
						    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
						    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
						    <tr><td>Telepon</td><td><?php echo $telepon; ?></td></tr>
                            <tr><td>Status</td>
                                <td>
                                    <?php 
                                        if($status == 0) echo "Belum Menikah / Singel";
                                        else  echo "Menikah";
                                    ?>
                                </td>
                            </tr>
                            <tr><td>Jumlah Anak</td><td><?php echo $anak; ?></td></tr>
                            <tr><td>Kartu Keluarga</td><td><a data-toggle="modal" data-target="#<?php echo 'kk'.$id  ?>"><i class="fas fa-image" style="font-size: 25px"></i></a></td></tr>
                            <!-- <tr><td>Slip Gaji</td><td><a href="" target="_blank"><i class="fas fa-image" style="font-size: 25px"></i></a></td></tr> -->

						    <tr><td></td><td><a href="<?php echo site_url('karyawan') ?>" class="btn btn-danger">Kembali</a></td></tr>
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


    <?php foreach ($karyawan_data as $karyawan)   { ?>
        <div class="text-center">
            <div class="modal fade" id="<?php echo 'slip'.$karyawan->id  ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="color-line"></div>
                        <div class="modal-header text-center">
                            <h4 class="modal-title">Slip Gaji <b><?php echo $karyawan->nama ?></b></h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">
                                <img alt="<?php echo $karyawan->nama ?>" src="<?php echo base_url('/uploads/photo/karyawan/').$karyawan->slip?>" >
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="<?php echo 'kk'.$karyawan->id  ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="color-line"></div>
                        <div class="modal-header text-center">
                            <h4 class="modal-title">Kartu Keluarga <b><?php echo $karyawan->nama ?></b></h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">
                                <img alt="<?php echo $karyawan->nama ?>" src="<?php echo base_url('/uploads/photo/karyawan/').$karyawan->kk?>" >
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


</div>