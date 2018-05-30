<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- menampilkan html v_header -->        
        <?php $this->load->view('front_end/shared/v_header'); ?>
    </head>
    <body>
        
        <!-- kondisi jika user berada pada menu edit profie, login, registrasi, periksa, konsul dokter, dan kunjungan maka navbar menu tidak akan muncul -->
        <header class="<?php if(($page_title == 'Edit Profile') or ($page_title == 'Masuk Akun') or ($page_title == 'Daftar Akun Baru') or ($page_title == 'Periksa') or ($page_title == 'Konsul Dokter') or ($page_title == 'Kunjungan')) { echo 'header-nonform'; } ?>">
            <!-- menampilkan html v_menu -->
            <?php $this->load->view('front_end/shared/v_menu'); ?>
        </header>

        <section class="main-content">
            <!-- menampilkan html '_content' yang dikirim melalui controller PHP -->        
            <?php $this->load->view($_content); ?>
        </section>
        
        <!-- kondisi jika user berada dihome maka akan menampilkan section contact -->
        <?php
            if (isset($_contact)) {
                $this->load->view('front_end/shared/v_contact');
            }
        ?>

        <!-- html popover ketika user login lalu klik foto pada header  -->
        <div id="popover-content-profile" class="hide" style="top:500px;">

            <!-- foto profile user -->
            <div class="row" style="padding-bottom:25px;border-bottom:1px solid rgba(193,193,193,.8)">
                <div class="col-md-12" style="text-align:center">
                <img src="<?php echo($user['foto'] ? base_url($user['foto']) : base_url('assets/images/home/header/default-avatar.png')); ?>" onerror="imgError(this);" alt="Avatar" class="avatar-header" style="width:75px;height:75px;margin-top:5%;margin-bottom:5%"><br>
                <span style="font-size:18px;text-align:center"><?php echo $user['nama_user']; ?></span><br>
                </div>
            </div>

            <!-- button edit profile -->
            <div class="col-md-6 no-padding">
            <div class="row list-popover-profile" style="height:50px;text-align:center">
                <a href="<?php echo site_url('ubah-profil'); ?>"><div class="col-md-6" style="padding-top:15px">
                    <span style="font-size:16px;color:#fff;"><i class="glyphicon glyphicon-user" style="color:#fff"></i> Profile</span>
                </div></a>
            </div>
            </div>

            <!-- button keluar -->
            <div class="col-md-6" style="border-left: 1px solid rgba(193,193,193,.8) !important">
                <div class="row list-popover-profile" style="height:50px;text-align:center">
                <a href="<?php echo site_url('c_autentikasi/logout'); ?>"><div class="col-md-6" style="padding-top:15px">
                    <span style="font-size:16px;color:#fff"><i class="glyphicon glyphicon-share-alt" style="color:#fff"></i> Keluar</span>
                </div></a>
            </div>
            </div>
        </div>

        <!-- menampilkan html v_footer -->        
        <?php $this->load->view('front_end/shared/v_footer'); ?>
    </body>
</html>
