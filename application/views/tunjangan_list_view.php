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
                        <a class="btn btn-primary" href="<?php echo base_url('tunjangan/create') ?>"><i class="fa fa-plus "></i> Tambah Data Tunjangan</a>
                        <br><br>
                        <table class="table table-bordered table-striped" id="example2">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>Nama Tunjangan</th>
                                    <th>Uang Tunjangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $start = 0;
                                foreach ($tunjangan_data as $tunjangan) {
                            ?>
                                <tr>
                                <td><?php echo ++$start ?></td>
                                <td><?php echo $tunjangan->nama_tunjangan ?></td>
                                <td><?php echo 'Rp. '.number_format($tunjangan->uang_tunjangan)  ?></td>
                                <?php if($tunjangan->id != '11' && $tunjangan->id != '12') : ?>
                                <td style="text-align:center" width="200px">
                                    <?php 
                                        echo anchor(site_url('tunjangan/update/'.$tunjangan->id),' Ubah ','<a class="badge badge-success"','</a>'); 
                                        echo ' '; 
                                        echo anchor(site_url('tunjangan/delete/'.$tunjangan->id),' Hapus ', '<a class="badge badge-danger" onclick="return confirm(\'Apa Anda Yakin ?\');" ','</a>'); 
                                    ?>
                                </td>
                                <?php else: ?>
                                    <td style="text-align:center" width="200px">
                                    <?php 
                                        echo anchor(site_url('tunjangan/update/'.$tunjangan->id),' Ubah ','<a class="badge badge-success"','</a>'); 
                                        echo ' '; 
                                       
                                    ?>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php } ?>
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
