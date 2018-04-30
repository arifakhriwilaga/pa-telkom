<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('front_end/shared/header'); ?>
    </head>
    <body>
        <header class="<?php if(($page_title == 'Edit Profile') or ($page_title == 'Masuk Akun') or ($page_title == 'Daftar Akun Baru') or ($page_title == 'Periksa') or ($page_title == 'Konsul Dokter') or ($page_title == 'Kunjungan')) { echo 'header-nonform'; } ?>">
            <?php $this->load->view('front_end/shared/menu'); ?>
        </header>
        <section class="main-content">
            <?php $this->load->view($_content); ?>
        </section>
        <?php
            if (isset($_contact)) {
                $this->load->view('front_end/shared/contact');
            }
        ?>
        <div id="popover-content-profile" class="hide" style="top:500px;">
            <div class="row" style="padding-bottom:25px;border-bottom:1px solid rgba(193,193,193,.8)">
                <div class="col-md-12" style="text-align:center">
                <img src="<?php echo($user['profile_picture'] ? base_url($user['profile_picture']) : base_url('assets/images/home/header/default-avatar.png')); ?>" onerror="imgError(this);" alt="Avatar" class="avatar-header" style="width:75px;height:75px;margin-top:5%;margin-bottom:5%"><br>
                <span style="font-size:18px;text-align:center"><?php echo $user['name']; ?></span><br>
                </div>
            </div>
            <div class="col-md-6 no-padding">
            <div class="row list-popover-profile" style="height:50px;text-align:center">
                <a href="<?php echo site_url('ubah-profil'); ?>"><div class="col-md-6" style="padding-top:15px">
                    <span style="font-size:16px;color:#fff;"><i class="glyphicon glyphicon-user" style="color:#fff"></i> Profile</span>
                </div></a>
            </div>
            </div>
            <div class="col-md-6" style="border-left: 1px solid rgba(193,193,193,.8) !important">
                <div class="row list-popover-profile" style="height:50px;text-align:center">
                <a href="<?php echo site_url('authentication/logout'); ?>"><div class="col-md-6" style="padding-top:15px">
                    <span style="font-size:16px;color:#fff"><i class="glyphicon glyphicon-share-alt" style="color:#fff"></i> Keluar</span>
                </div></a>
            </div>
            </div>
        </div>
        <?php if(($page_title != 'Lupa Password') and ($page_title != 'Notifikasi') and ($page_title != 'Kunjungan') &&  ($page_title != 'Home') and  ($page_title != 'Edit Profile') and ($page_title != 'Masuk Akun') and ($page_title != 'Daftar Akun Baru') and ($page_title != 'Periksa') and ($page_title != 'Konsul Dokter') and ($page_title != 'Kunjungan')) { ?>
        <section id="footer_widget" class="footer_widget" style="height:55px">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p style="font-size:15px;color:#fff;text-align:center;max-width:100%;margin-top:17px"> &copy;2018 Rekomendasi Kesehatan Untuk Prediksi Penyakit</p>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
        <?php $this->load->view('front_end/shared/footer'); ?>
    </body>
</html>
