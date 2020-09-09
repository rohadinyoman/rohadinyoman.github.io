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

                            <div class="form-group">
                                <label for="varchar">NIP <?php echo form_error('id_karyawan') ?></label>
                                <select name="id_karyawan" class="form-control">
                                    <?php if ($id_karyawan): ?>
                                        <option value="<?php echo $id_karyawan;?>"><i><?php echo $id_karyawan?> [dipilih]</i></option>
                                    <?php endif ?>
                                <option>----------</option>
                                <?php foreach($karyawan_data as $karyawan) : ?>
                                <option value='<?php echo $karyawan->nip ?>'>
                                    <?php echo $karyawan->nip ?> | <?php echo $karyawan->nama ?>
                                </option>
                                <?php endforeach; ?>
                              </select>

                            </div>


                            <?php foreach($tunjangan_data as $tunjangan) : ?>
                                <?php if($tunjangan->id != '11' && $tunjangan->id != '12') : ?>
                            <div class="form-check">
                              <input class="form-check-input" name="tunjangan[]" type="checkbox" value="<?php echo $tunjangan->nama_tunjangan; ?>" id="<?php echo $tunjangan->nama_tunjangan; ?>" >
                              <label class="form-check-label" for="<?php echo $tunjangan->nama_tunjangan; ?>">
                                <?php echo $tunjangan->nama_tunjangan; ?>
                              </label>
                            </div>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('tunjangan_karyawan') ?>" class="btn btn-default">Cancel</a>
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
