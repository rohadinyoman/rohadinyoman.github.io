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
                            <!-- <div class="col-lg-6"> -->
                        <?php if($judul_halaman == 'Ubah Data Absensi'): ?>
                        <div class="form-group">
                            <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
                            <input type="date" readonly="" required="" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                        </div>
                        <?php else: ?>
                        <div class="form-group">
                            <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
                            <input type="date" required="" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                        </div>   
                        <?php endif; ?>
                        <!-- </div> -->
                       
                        <br>
                        <div class="row col-lg-12 table-responsive">
                        <table cellpadding="1" id="example2" cellspacing="1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Jam Datang</th>
                                <th>Jam Pulang</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php if($judul_halaman != 'Ubah Data Absensi'): ?>
                                <?php if(count($karyawan_data)): ?>
                                    <?php $i=0 ?>
                                <?php foreach($karyawan_data as $karyawan ) : ?>
                                <tr class="text-center">
                                    <td><input type="hidden" class="form-control" name="nip[]" value="<?php echo $karyawan->nip; ?>"/ ><?php echo $karyawan->nip; ?></td>
                                    
                                    <td><input type="hidden" class="form-control" name="nama_karyawan[]" value="<?php echo $karyawan->nama; ?>" /><?php echo $karyawan->nama; ?></td>                   
                                    <td>
                                        <div class="form-group">
                                            <label for="varchar"><?php echo form_error('keterangan') ?></label>
                                            <select name="keterangan[]" class="form-control">
                                                <?php if (isset($keterangan) && $judul_halaman == 'Ubah Data Absensi'): ?>
                                                    <option value="<?php echo $keterangan;?>"><i><?php echo $keterangan?> [dipilih]</i></option>
                                                    <option>----------</option>
                                                <?php endif ?>
                                            
                                            <?php foreach($keterangan_presensi_data as $ket) : ?>
                                            <option value='<?php echo $ket->keterangan ?>'><?php echo $ket->keterangan ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                        </div>   
                                    </td>
                                    <td>
                                        <?php if (isset($keterangan) && $judul_halaman == 'Ubah Data Absensi'): ?>
                                        <input type="text" class="form-control" name="jam_masuk[]" value="<?php echo $jam_masuk[$i]; ?>"/ >
                                        <?php else: ?>
                                        <input type="text" class="form-control" name="jam_masuk[]" value=""/ >
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (isset($keterangan) && $judul_halaman == 'Ubah Data Absensi'): ?>
                                        <input type="text" class="form-control" name="jam_keluar[]" value="<?php echo $jam_keluar?>"/ >
                                        <?php else: ?>
                                            <input type="text" class="form-control" name="jam_keluar[]" value=""/ >
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php $i++; ?>
                                <?php endif; ?>
                              <?php else: ?>
                                <tr class="text-center">
                                    <td><input type="hidden" class="form-control" name="nip" value="<?php echo $nip; ?>"/ ><?php echo $nip; ?></td>
                                    
                                    <td><input type="hidden" class="form-control" name="nama_karyawan" value="<?php echo $nama_karyawan; ?>" /><?php echo $nama_karyawan; ?></td>                   
                                    <td>
                                        <div class="form-group">
                                            <label for="varchar"><?php echo form_error('keterangan') ?></label>
                                            <select name="keterangan" class="form-control">
                                                <?php if (isset($keterangan) && $judul_halaman == 'Ubah Data Absensi'): ?>
                                                    <option value="<?php echo $keterangan;?>"><i><?php echo $keterangan?> [dipilih]</i></option>
                                                    <option>----------</option>
                                                <?php endif ?>
                                            
                                            <?php foreach($keterangan_presensi_data as $ket) : ?>
                                            <option value='<?php echo $ket->keterangan ?>'><?php echo $ket->keterangan ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                        </div>   
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="jam_masuk" value="<?php echo $jam_masuk; ?>"/ >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="jam_keluar" value="<?php echo $jam_keluar ?>"/ >
                                    </td>
                                </tr>
                              <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('absensi') ?>" class="btn btn-default">Cancel</a>
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

