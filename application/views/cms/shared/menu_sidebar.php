<section class="sidebar" style="height: auto;">
    <ul class="sidebar-menu tree" data-widget="tree">
    		<li class="header">MENU UTAMA</li>
        <li class="<?php echo($page_title == 'Dasbor' ? 'active' : ''); ?>"><a href="<?php echo site_url('dasbor'); ?>" style="font-weight: normal;"><i class="fa fa-home"></i> <span>Dasbor</span></a></li>
        <li class="<?php echo($page_title == 'Konsultasi' ? 'active' : ''); ?>"><a href="<?php echo site_url('kelola-konsultasi'); ?>" style="font-weight: normal;"><i class="fa fa-book"></i> <span>Kelola Konsultasi</span></a></li>
        <li class="<?php echo($page_title == 'Cetak Riwayat' ? 'active' : ''); ?>"><a href="<?php echo site_url('cetak-riwayat'); ?>" style="font-weight: normal;"><i class="fa fa-file"></i> <span>Cetak Riwayat</span></a></li>
        <li class="<?php echo($page_title == 'Kelola Akun' ? 'active' : ''); ?>"><a href="<?php echo site_url('kelola-akun'); ?>" style="font-weight: normal;"><i class="fa fa-users"></i> <span>Kelola Akun</span></a></li>
        <li class="<?php echo($page_title == 'Kelola Notifikasi' ? 'active' : ''); ?>"><a href="<?php echo site_url('kelola-notifikasi'); ?>" style="font-weight: normal;"><i class="fa fa-wechat"></i> <span>Kelola Notifikasi</span></a></li>
    </ul>
</section>