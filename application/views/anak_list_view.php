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
                        <a class="btn btn-primary" href="<?php echo base_url('anak/create') ?>"><i class="fa fa-plus "></i> Tambah Data Anak Karyawan</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="example2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Id Karyawan</th>
                                        <th>Nama Anak</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tgl Lahir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $start = 0;
                                        foreach ($anak_data as $anak){
                                    ?>
                                    <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td class="text-center"><img width="80" height="85" alt="<?php echo $anak->nama_anak ?>" src="<?php echo base_url('/uploads/photo/anak/'). $anak->foto ?>" >
                                    </td>
                                    <td><?php echo $anak->id_karyawan ?></td>
                                    <td><?php echo $anak->nama_anak ?></td>
                                    <td><?php echo $anak->tempat_lahir ?></td>
                                    <td><?php echo date('d-M-Y', strtotime($anak->tgl_lahir))  ?></td>
                                     <td style="text-align:center">
                                    <?php 
                                        echo anchor(site_url('anak/update/'.$anak->id),' Ubah ','<a class="badge badge-success"','</a>'); 
                                        echo ' '; 
                                        echo anchor(site_url('anak/delete/'.$anak->id),' Hapus ', '<a class="badge badge-danger" onclick="return confirm(\'Apa Anda Yakin ?\');" ','</a>'); 
                                        ?>
                                    </td>
                                    </tr>
                                    <?php } ?>
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


