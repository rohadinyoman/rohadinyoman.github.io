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
                        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                           
                            <div class="form-group">
                                <label for="varchar">id_karyawan <?php echo form_error('id_karyawan') ?></label>
                                <select name="id_karyawan" class="form-control">
                                    <?php if ($id_karyawan): ?>
                                        <option value="<?php echo $id_karyawan;?>"><i><?php echo $id_karyawan?> [dipilih]</i></option>
                                    <?php endif ?>
                                <option value="">Pilih Karyawan :</option>
                                <?php foreach($karyawan_data as $karyawan) : ?>
                                <option value='<?php echo $karyawan->nip ?>'><?php echo $karyawan->nip. ' - '. $karyawan->nama ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="varchar">Nama Istri <?php echo form_error('nama_istri') ?></label>
                                <input type="text" class="form-control" name="nama_istri" id="nama_istri" placeholder="Nama Istri" value="<?php echo $nama_istri; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="date">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
                            </div>
                            <?php if($judul_halaman == 'Ubah Data Istri Karyawan') :?>
                                <?php if($foto): ?>
                                    <img width="150" src="<?php echo base_url('/uploads/photo/istri/').$foto?>">
                                <?php endif; ?>
                            <?php endif; ?>
                            
                            <?php if($judul_halaman == 'Ubah Data Istri Karyawan') : ?>
                                <input type="hidden" name="old_image" value="<?php echo $old_image ?>">
                                <p>*Biarkan saja bagian ini jika tidak ingin mengubah foto</p>
                            <?php endif; ?>
                            
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto" for="foto">
                                <br>
                            </div>

                            
                            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('istri') ?>" class="btn btn-default">Cancel</a>
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
