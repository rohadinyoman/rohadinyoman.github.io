   
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
                            <?php if($judul_halaman != 'Tambah Data Karyawan'): ?>
                                <div class="form-group">
                                    <label for="varchar">Nip <?php echo form_error('nip') ?></label>
                                    <input type="text" readonly="" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <label for="varchar">Nip <?php echo form_error('nip') ?></label>
                                    <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="varchar">jabatan <?php echo form_error('jabatan') ?></label>
                                <select name="jabatan" class="form-control">
                                    <?php if ($jabatan): ?>
                                        <option value="<?php echo $jabatan;?>"><i><?php echo $jabatan?> [dipilih]</i></option>
                                    <?php endif ?>
                                <option value="">Pilih Jabatan : </option>
                                <?php foreach($jabatan_data as $jabatan) : ?>
                                <option value='<?php echo $jabatan->nama_jabatan ?>'>- <?php echo $jabatan->nama_jabatan ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="varchar">jk <?php echo form_error('jk') ?></label>
                                <select name="jk" class="form-control">
                                    <?php if ($jk): ?>
                                       <option value='<?php echo $jk ?>'>
                                            <?php if($jk == 1)
                                                echo 'Laki-laki '. '[dipilih]';
                                                else
                                                    'Perempuan '. '[dipilih]';
                                                ?>
                                        </option>
                                       <option value="">------</option>
                                    <?php endif ?>
                                        <option value='1'>Laki-laki</option>
                                        <option value='0'>Perempuan</option>
                                
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="varchar">Kota Lahir <?php echo form_error('kota_lahir') ?></label>
                                <input type="text" class="form-control" name="kota_lahir" id="kota_lahir" placeholder="Kota Lahir" value="<?php echo $kota_lahir; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="varchar">agama <?php echo form_error('agama') ?></label>
                                <select name="agama" class="form-control">
                                    <?php if ($agama): ?>
                                        <option value="<?php echo $agama;?>"><i><?php echo $agama?> [dipilih]</i></option>
                                    <?php endif ?>
                                <option value="">Pilih Agama : </option>
                                <?php foreach($agama_data as $agama) : ?>
                                <option value='<?php echo $agama->agama ?>'>- <?php echo $agama->agama ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>


                            <div class="form-group">
                                <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="varchar">Email <?php echo form_error('email') ?></label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="varchar">Telepon <?php echo form_error('telepon') ?></label>
                                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="varchar">Status <?php echo form_error('status') ?></label>
                                <select name="status" class="form-control">
                                    <?php if ($status): ?>
                                        <?php
                                            if($status == 1){
                                                $ket = 'Menikah';
                                            } 
                                            else{
                                                $ket = 'Belum Menikah / Singel';
                                            }

                                        ?>
                                         <option value="<?php echo $status;?>"><i><?php echo $ket?> [dipilih]</i></option>
                                    <?php endif ?>
                                    <option value="">Pilih Status : </option>
                                    <option value="1"> Menikah</option>
                                    <option value="0"> Belum Menikah / Singel</option>
                                
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="varchar">Jumlah Anak <?php echo form_error('anak') ?></label>
                                <br>*Maksimal tunjangan sebanyak 2 anak
                                <select name="anak" class="form-control">
                                    <?php if ($anak): ?>
                                        <option value="<?php echo $anak;?>"><i><?php echo $anak?> [dipilih]</i></option>
                                    <?php endif ?>
                                <option value="">Jumlah Anak : </option>
                                <option value="0"> 0 </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                
                              </select>
                            </div>


                            <!-- Upload foto Karyawan -->
                            <div class="form-group">
                                <label for="varchar">Foto Karyawan <?php echo form_error('foto') ?></label>
                           
                            
                            <?php if($judul_halaman == 'Ubah Data Karyawan') :?>
                                <?php if($foto): ?>
                                    <img width="150" src="<?php echo base_url('/uploads/photo/karyawan/').$foto?>">
                                <?php else: ?>
                                    <img width="80" height="105" alt="<?php echo $karyawan->nama ?>" src="<?php echo base_url('/uploads/photo/karyawan/').$karyawan->foto?>">
                                <?php endif ?>
                            <?php endif; ?>
                            
                            <?php if($judul_halaman == 'Ubah Data Karyawan') : ?>
                                <input type="hidden" name="old_image" value="<?php echo $old_image ?>">
                                <p>*Biarkan saja bagian ini jika tidak ingin mengubah foto</p>
                            <?php endif; ?>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto" for="foto">
                                <br>
                            </div>
                            </div>
                            <!-- end upload foto karyawna -->

                            <!-- Upload foto KK -->
                            <br>
                            <div class="form-group">
                                <label for="varchar">Foto Kartu Keluarga <?php echo form_error('kk') ?></label>
                            
                            <?php if($judul_halaman == 'Ubah Data Karyawan') :?>
                                <?php if($kk): ?>
                                    <img width="150" src="<?php echo base_url('/uploads/photo/karyawan/').$kk?>">
                                <?php else: ?>
                                    <img width="80" height="105" alt="<?php echo $karyawan->nama ?>" src="<?php echo base_url('/uploads/photo/karyawan/').$karyawan->kk?>">
                                <?php endif ?>
                            <?php endif; ?>
                            
                            <?php if($judul_halaman == 'Ubah Data Karyawan') : ?>
                                <input type="hidden" name="old_image_kk" value="<?php echo $old_image_kk ?>">
                                <p>*Biarkan saja bagian ini jika tidak ingin mengubah kk</p>
                            <?php endif; ?>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="kk" name="kk" for="kk">
                                <br>
                            </div>
                            </div>
                            <!-- end Upload foto KK -->

                            <!-- Upload Slip Gaji -->
                            <br>
                            <div class="form-group">
                                <label for="varchar">Foto Slip Gaji <?php echo form_error('slip') ?></label>
                            
                            <?php if($judul_halaman == 'Ubah Data Karyawan') :?>
                                <?php if($slip): ?>
                                    <img width="150" src="<?php echo base_url('/uploads/photo/karyawan/').$slip?>">
                                <?php else: ?>
                                    <img width="80" height="105" alt="<?php echo $karyawan->nama ?>" src="<?php echo base_url('/uploads/photo/karyawan/').$karyawan->slip?>">
                                <?php endif ?>
                            <?php endif; ?>
                            
                            <?php if($judul_halaman == 'Ubah Data Karyawan') : ?>
                                <input type="hidden" name="old_image_slip" value="<?php echo $old_image_slip ?>">
                                <p>*Biarkan saja bagian ini jika tidak ingin mengubah slip</p>
                            <?php endif; ?>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="slip" name="slip" for="slip">
                                <br>
                            </div>
                            </div>
                            <!-- End Upload Slip Gaji -->



                            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('karyawan') ?>" class="btn btn-default">Cancel</a>
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