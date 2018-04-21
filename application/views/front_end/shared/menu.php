        <?php if ((isset($user)) && ($user['level_user'] == 'user')) { ?>
            <div class="container">
                <div class="nav-top clearfix">
                    <div class="logo">
                        <div class="col-md-3" style="padding-right:0;padding-left:0">
                        <a  href="<?php echo site_url('/'); ?>" class="navbar-brand"><img src="<?php echo base_url('assets/images/home/header/logo.png'); ?>" alt="Logo" /></a>
                        </div>
                        <div class="col-md-8" style="padding-top:2%;padding-left:3px;padding-right:0">
                            <span style="font-size:18px;color:#e67e22"><strong>Rekomendasi Makanan Pada Solusi Penyakit</strong></span>
                        </div>
                    </div>
                    <?php if ($page_title!= 'Edit Profile') { ?>
                    <div class="head_top_social pull-right">
                        <span class="head-customer">
                            <a href="<?php echo site_url('notifikasi'); ?>"><i id="count-notif" class="fa fa-fw fa-bell badge1" data-badge="0" style="font-size: 20px;color:#2c3e50"></i></a>
                            <a data-toggle="popover" href="#" style="color: #2c3e50">
                                <img src="<?php echo($user['profile_picture'] ? base_url($user['profile_picture']) : base_url('assets/images/home/header/default-avatar.png')); ?>" onerror="imgError(this);" alt="Avatar" class="avatar-header">
                                <?php echo $user['name']; ?>
                            </a>
                        </span>
                    </div>
                    <?php } ?>
                    <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
        <?php } else { ?>
            <div class="container">
                <div class="nav-top clearfix">
                    <div class="logo">
                        <div class="col-md-3" style="padding-right:0;padding-left:0">
                            <a  href="<?php echo site_url('/'); ?>" class="navbar-brand"><img src="<?php echo base_url('assets/images/home/header/logo.png'); ?>" alt="Logo" /></a>
                        </div>
                        <div class="col-md-8" style="padding-top:2%;padding-left:3px;padding-right:0">
                            <span style="font-size:18px;color:#e67e22"><strong>Rekomendasi Makanan Pada Solusi Penyakit</strong></span>
                        </div>
                    </div>

                    <div class="head_top_social pull-right">
                        <span class="head-customer"><a class="<?php echo($page_title == 'Masuk Akun' ? 'active' : ''); ?>" href="<?php echo site_url('masuk-akun'); ?>">Login</a> | <a class="<?php echo($page_title == 'Daftar Akun Baru' ? 'active' : ''); ?>" href="<?php echo site_url('registrasi'); ?>">Daftar</a> </span>
                    </div>

                    <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
                    </button>

                </div>
            </div>
        <?php } 
            if (($page_title != 'Masuk Akun') and ($page_title != 'Daftar Akun Baru') and ($page_title != 'Edit Profile') and ($page_title != 'Periksa') and ($page_title != 'Konsul Dokter') and ($page_title != 'Kunjungan')) { ?>
                <div class="main-nav navbar-collapse collapse">
                    <div class="container">
                        <div class="minilogo">
                            <a href="#" class="navbar-brand"><img src="<?php echo base_url('assets/images/home/header/logo.png'); ?>" alt="Logo" /></a>
                        </div>
                        <ul class="nav nav-justified">
                            <li><a class="<?php echo($page_title == 'Home' ? 'active' : ''); ?>" href="<?php echo site_url('/'); ?>">Home</a></li>
                            <li><a class="<?php echo($page_title == 'Periksa' ? 'active' : ''); ?>" href="<?php echo site_url('periksa/step-1'); ?>">Periksa</a></li>
                            <li><a class="<?php echo($page_title == 'Konsul Dokter' ? 'active' : ''); ?>" href="<?php echo site_url('konsul-dokter'); ?>">Konsul Dokter</a></li>
                            <li><a class="<?php echo($page_title != 'Masuk Akun' && $page_title != 'Daftar Akun Baru' && $page_title != 'Edit Profile'&& $page_title != 'Periksa' && $page_title != 'Konsul Dokter' && $page_title != 'Kunjungan' && $page_title != 'Notifikasi' && $page_title != 'Home' ? 'active' : ''); ?>" href="<?php echo site_url('info-sehat'); ?>">Info Sehat</a></li>
                            <?php if (isset($user)) { ?>
                                <li><a class="<?php echo($page_title == 'Kunjungan' ? 'active' : ''); ?>" href="<?php echo site_url('kunjungan'); ?>">Kunjungan</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
        <?php } ?>