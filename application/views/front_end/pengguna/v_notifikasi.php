<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-center">
                <div class="panel-form basic-form">
                    <h2>
                        <i class="fa fa-fw fa-bell" style="font-size: 20px;color:#565656"></i>
                        Notifikasi Anda
                    </h2>
                    <?php
                    if (sizeof($notifications) > 0) {
                        $no = 1;
                        foreach ($notifications as $key => $value) {
                            $date = $value->tgl_konsul;
                    ?>
                    <div class="row">
                        <div class="col-md-1" style="padding-right: 0;width: 40px"><?php echo $no; ?>.</div>
                        <div class="col-md-11" style="padding-left: 0">
                            <div class="form-group">
                                <a class="detail-info-slider" title="<?php echo $value->pertanyaan_konsul; ?>" href="<?php echo site_url('detail-notifikasi/'.$value->id_konsul); ?>">
                                    <?php echo $value->pertanyaan_konsul; ?>
                                </a>
                                <p class="no-padding">Waktu: <?php echo $date; ?><br>
                                    <?php if($value->status_baca == 'false' && $value->status_kirim == 'true') { ?>
                                        <b>
                                            <i class="glyphicon glyphicon-info-sign"></i> 
                                            Pertanyaan anda telah dijawab oleh dr. <?php echo $value->dokter; ?>
                                        </b>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 0;margin-bottom: 15px">
                    <?php
                        $no++;
                        }
                    } else { ?>

                    <div class="row">
                        <div class="col-md-1" style="padding-right: 0;width: 40px"></div>
                        <div class="col-md-11" style="padding-left: 0">
                            <div class="form-group"><br><br>
                                <p class="no-padding text-center">Tidak ada notifikasi</p><br><br>
                            </div>
                        </div>
                    </div>

                    <?php
                    }
                    ?>
                    <div class="pull-right">
                        <a href="<?php echo site_url('/'); ?>">
                            <button class="btn btn-login btn-sm" style="min-width: 7px;height:38px;font-size: 13px;background-color: #636e72;border-color: #636e72">
                                <span class="fa fa-home"></span>
                                 Kembali ke home
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>