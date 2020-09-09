<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="index.html">
                <!-- <img src="images/profile.jpg" class="img-circle m-b" alt="logo"> -->
            </a>

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">Administrator</span>


            </div>
        </div>

        <ul class="nav" id="side-menu">
            <!-- <li>
                <a href="<?php echo base_url('home') ?>"> <span class="nav-label">Dashboard</span></a>
            </li> -->
            <li>
                <a href="#"><span class="nav-label"><i class="fas fa-database"></i> Master Data</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url('jabatan') ?>"><i class="fas fa-medal"></i> Jabatan</a></li>
                    <li><a href="<?php echo base_url('tunjangan') ?>"><i class="fas fa-money-bill-wave"></i> Tunjangan</a></li>
                    <li><a href="<?php echo base_url('keterangan_presensi') ?>"><i class="fas fa-tags"></i> Keterangan Kehadiran</a></li>
                    <li><a href="<?php echo base_url('agama') ?>">Agama</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label"><i class="fas fa-user-tie"></i> Karyawan</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url('karyawan') ?>"> <span class="nav-label"><i class="fas fa-user-tie"></i> Data Karyawan</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('istri') ?>"> <span class="nav-label"><i class="fas fa-female"></i> Data Istri</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('anak') ?>"> <span class="nav-label"><i class="fas fa-child"></i><i class="fas fa-child"></i> Data Anak</span></a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="<?php echo base_url('absensi') ?>"> <span class="nav-label"><i class="fas fa-list-ul"></i> Data Kehadiran</span></a>
            </li>
            <li>
                <a href="<?php echo base_url('tunjangan_karyawan') ?>"> <span class="nav-label"><i class="fas fa-hand-holding-usd"></i> Tunjangan Karyawan</span></a>
            </li>
            <li>
                <a href="<?php echo base_url('gaji') ?>"> <span class="nav-label"><i class="far fa-money-bill-alt"></i> Data Gaji</span></a>
            </li>    
            <li>
                <a href="<?php echo base_url('auth/logout') ?>"> <span class="nav-label">Logout</span></a>
            </li>

        </ul>
    </div>
</aside>
