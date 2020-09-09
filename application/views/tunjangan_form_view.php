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
                        <form action="<?php echo $action; ?>" method="post">
                            <?php if($id != '11' && $id != '12') : ?>
                                <div class="form-group">
                                    <label for="varchar">Nama Tunjangan <?php echo form_error('nama_tunjangan') ?></label>
                                    <input type="text" class="form-control" name="nama_tunjangan" id="nama_tunjangan" placeholder="Nama Tunjangan" value="<?php echo $nama_tunjangan; ?>" />
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <label for="varchar">Nama Tunjangan <?php echo form_error('nama_tunjangan') ?></label>
                                    <input type="text" readonly="" class="form-control" name="nama_tunjangan" id="nama_tunjangan" placeholder="Nama Tunjangan" value="<?php echo $nama_tunjangan; ?>" />
                                </div>  
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="int">Uang Tunjangan <?php echo form_error('uang_tunjangan') ?></label>
                                <input type="number" class="form-control" name="uang_tunjangan" id="uang_tunjangan" placeholder="Uang Tunjangan" value="<?php echo $uang_tunjangan; ?>" />
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('tunjangan') ?>" class="btn btn-default">Cancel</a>
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
