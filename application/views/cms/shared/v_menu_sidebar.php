<section class="sidebar" style="height: auto;">
    <ul class="sidebar-menu tree" data-widget="tree">
    	<li class="header">MENU UTAMA</li>
        <!-- menu dasbord -->
            <li class="<?php echo($page_title == 'Dasbor' ? 'active' : ''); ?>"><a href="<?php echo site_url('dasbor'); ?>" style="font-weight: normal;"><i class="glyphicon glyphicon-home"></i> <span class="glyphicons glyphicons-book"></span><span>Dasbor</span></a></li>
        <?php if ((isset($user)) && ($user['level_user'] == 'admin')) { ?>        
            <!-- menu kelola konsultasi -->
            <li class="<?php echo($page_title == 'Konsultasi' ? 'active' : ''); ?>"><a href="<?php echo site_url('kelola-konsultasi'); ?>" style="font-weight: normal;"><i class="glyphicon glyphicon-book"></i> <span>Kelola Konsultasi</span></a></li>
            <!-- menu cetak riwayat -->
            <li class="<?php echo($page_title == 'Cetak Riwayat' ? 'active' : ''); ?>"><a href="<?php echo site_url('cetak-riwayat'); ?>" style="font-weight: normal;"><i class="glyphicon glyphicon-duplicate"></i> <span>Cetak Riwayat</span></a></li>
            <!-- menu kelola akun -->
            <li class="<?php echo($page_title == 'Kelola Akun' ? 'active' : ''); ?>"><a href="<?php echo site_url('kelola-akun'); ?>" style="font-weight: normal;"><i class="fa fa-users"></i> <span>Kelola Akun</span></a></li>
        <?php } ?>
        <!-- menu kelola notifikasi -->
        <?php if ((isset($user)) && ($user['level_user'] == 'dokter') || ($user['level_user'] == 'admin')) { ?>
            <li class="<?php echo($page_title == 'Kelola Notifikasi' ? 'active' : ''); ?>"><a href="<?php echo site_url('kelola-notifikasi'); ?>" style="font-weight: normal;"><i class="fa fa-wechat"></i> <span>Kelola Notifikasi</span></a></li>
        <?php } ?>
    </ul>
</section>