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
                        <a class="btn btn-primary" href="<?php echo base_url('tunjangan_karyawan/create') ?>"><i class="fa fa-plus "></i> Tambah Data Tunjangan Karyawan</a>
                        <br><br>
                        <table class="table table-bordered table-striped" id="example2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id_Karyawan</th>
                                <th>Nama</th>
                                <th>Tujangan</th>
                                <th>Jml</th>
                                <th>Biaya</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $start = 0;
                            foreach ($tunjangan_karyawan_data as $tunjangan_karyawan) {
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $tunjangan_karyawan->id_karyawan ?></td>
                            <td><?php echo $tunjangan_karyawan->nama ?></td>
                            <td><?php echo $tunjangan_karyawan->list_tunjangan ?></td>
                            <td><?php echo $tunjangan_karyawan->jumlah_tunjangan ?></td>
                            <td stylewidth="200px"><?php echo 'Rp. '.number_format($tunjangan_karyawan->biaya)  ?></td>
                            
                            <td style="text-align:center" width="200px">
                                <?php 
                                    // echo anchor(site_url('tunjangan_karyawan/update/'.$tunjangan_karyawan->id_karyawan),' Ubah ','<a class="badge badge-success"','</a>'); 
                                    // echo ' '; 
                                    echo anchor(site_url('tunjangan_karyawan/delete/'.$tunjangan_karyawan->id_karyawan),' Hapus ', '<a class="badge badge-danger" onclick="return confirm(\'Apa Anda Yakin ?\');" ','</a>'); 
                                    echo ' '; 
                                ?>
                            </td>
                        </tr>
                        <?php  }   ?>
                    
                </div>
                        
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


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="color-line"></div>
                                <div class="modal-header text-center">
                                    <h4 class="modal-title">Modal title</h4>
                                    <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                        printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                                        remaining essentially unchanged.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
