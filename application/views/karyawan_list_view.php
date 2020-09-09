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
                        <a class="btn btn-primary" href="<?php echo base_url('karyawan/create') ?>"><i class="fa fa-plus "></i> Tambah Data Karyawan</a>
                        <br><br>
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example2">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>Foto</th>
                                    <th>Nip</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>JK</th>
                                    <th>Status</th>
                                    <th>Anak</th>
                                    <th>Kartu_keluarga</th>
                                    <!-- <th>Slip_Gaji</th> -->
                                    <!-- <th>TTL</th> -->
                                    <!-- <th>Agama</th> -->
                                    <!-- <th>Alamat</th> -->
                                    <!-- <th>Email</th> -->
                                    <!-- <th>Telepon</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $start = 0;
                                    foreach ($karyawan_data as $karyawan)   {
                                ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td class="text-center">
                                        <img width="80" height="105" alt="<?php echo $karyawan->nama ?>" src="<?php echo base_url('/uploads/photo/karyawan/').$karyawan->foto?>" >
                                    </td>
                                    <td><?php echo $karyawan->nip ?></td>
                                    <td><?php echo $karyawan->nama ?></td>
                                    <td><?php echo $karyawan->jabatan ?></td>
                                        <?php if($karyawan->jk == 1) :   ?>
                                            <td>Laki-laki</td>
                                        <?php else :  ?>
                                            <td>Perempuan</td>
                                        <?php endif; ?>

                                        <?php if($karyawan->status == '1') :   ?>
                                            <td>Menikah</td>
                                        <?php else :  ?>
                                            <td>Belum Menikah / Singel</td>
                                        <?php endif; ?>
                                    <td><?php echo $karyawan->anak ?></td>
                                    <td>
                                        <div class="text-center">
                                            <button type="button" data-toggle="modal" data-target="#<?php echo 'kk'.$karyawan->id  ?>">
                                               <i class="fas fa-image" style="font-size: 25px"></i>
                                            </button> 
                                        </div>
                                    </td>
                                    <!-- <td>
                                        <div class="text-center">
                                            <button type="button" data-toggle="modal" data-target="#<?php echo 'slip'.$karyawan->id  ?>">
                                               <i class="fas fa-image" style="font-size: 25px"></i>
                                            </button> 
                                        </div>
                                    </td> -->

                                    <td style="text-align:center">
                                    <?php 
                                        echo anchor(site_url('karyawan/read/'.$karyawan->id),' Detail ','<a class="badge badge-primary2"','</a>'); 
                                        echo ' ';
                                        echo anchor(site_url('karyawan/update/'.$karyawan->id),' Ubah ','<a class="badge badge-success"','</a>'); 
                                        echo ' '; 
                                        echo anchor(site_url('karyawan/delete/'.$karyawan->id),' Hapus ', '<a class="badge badge-danger" onclick="return confirm(\'Apa Anda Yakin ?\');" ','</a>'); 
                                        ?>
                                    </td>
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


    