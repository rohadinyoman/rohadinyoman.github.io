
    
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
            <div class="col-lg-6">
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo $action; ?>" method="post">
                            <?php if($judul_halaman == 'Ubah Data Jabatan') : ?>
                            <div class="form-group">
                                <label for="varchar">Id Jabatan <?php echo form_error('id_jabatan') ?></label>
                                <input readonly="" type="text" class="form-control" name="id_jabatan" id="id_jabatan" placeholder="Id Jabatan" value="<?php echo $id_jabatan; ?>" />
                            </div>
                            <?php else : ?>
                            <div class="form-group">
                                <label for="varchar">Id Jabatan <?php echo form_error('id_jabatan') ?></label>
                                <input type="text" class="form-control" name="id_jabatan" id="id_jabatan" placeholder="Id Jabatan" value="<?php echo $id_jabatan; ?>" />
                            </div>
                            <?php endif; ?>    
                            <div class="form-group">
                                <label for="varchar">Nama Jabatan <?php echo form_error('nama_jabatan') ?></label>
                                <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" placeholder="Nama Jabatan" value="<?php echo $nama_jabatan; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Gaji Pokok <?php echo form_error('gaji_pokok') ?></label>
                                <input type="number" class="form-control" name="gaji_pokok" id="gaji_pokok" placeholder="Gaji Pokok" value="<?php echo $gaji_pokok; ?>" />
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('jabatan') ?>" class="btn btn-default">Cancel</a>
                        </form>
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