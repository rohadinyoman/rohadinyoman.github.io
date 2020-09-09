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
                        <a class="btn btn-primary" href="<?php echo base_url('jabatan/create') ?>"><i class="fa fa-plus "></i> Tambah Data Jabatan</a>
                        <br><br>
                        <table class="table table-bordered table-striped" id="example2">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>ID JABATAN</th>
                                    <th>NAMA JABATAN</th>
                                    <th>GAJI POKOK</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $start = 0;
                                    foreach ($jabatan_data as $jabatan) {
                                ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo strtoupper( $jabatan->id_jabatan )?></td>
                                    <td><?php echo $jabatan->nama_jabatan ?></td>
                                    <td><?php echo 'Rp. '.number_format($jabatan->gaji_pokok)  ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php 
                                        echo anchor(site_url('jabatan/update/'.$jabatan->id),' Ubah ','<a class="badge badge-success"','</a>'); 
                                        echo ' '; 
                                        echo anchor(site_url('jabatan/delete/'.$jabatan->id),' Hapus ', '<a class="badge badge-danger" onclick="return confirm(\'Apa Anda Yakin ?\');" ','</a>'); 
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

    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            SIMPEG - Sistem Informasi Pegawai
        </span>
        <?php echo date('Y') ?>
    </footer>

</div>