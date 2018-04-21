<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-center form-account">
                <div class="box">
                    <div class="panel-form basic-form">
                        <h2><a href="#" class=""><i class="fa fa-fw fa-bell" style="font-size: 20px;color:#565656"></i></a> Notifikasi Anda</h2>
                        <?php
                        if (sizeof($notifications) > 0) {
                            // echo '<pre>'.var_dump($notifications).'</pre>';exit();
                            $no = 1;
                            foreach ($notifications as $key => $value) {
                                $date = date_format(new DateTime($value->created_date), 'D, d F Y - H:i');
                        ?>
                        <div class="row">
                            <div class="col-md-1" style="padding-right: 0;width: 40px"><?php echo $no; ?>.</div>
                            <div class="col-md-11" style="padding-left: 0">
                                <div class="form-group">
                                    <label><a style="color:#565656" class="detail-info-slider" href="<?php echo site_url('detail-notifikasi/'.$value->consul_id); ?>"><?php echo $value->questions; ?></a></label>
                                    <p class="no-padding">Waktu <?php echo $date; ?><br>
                                        <?php if($value->read_status == 'false') { ?>
                                        <b><i class="glyphicon glyphicon-info-sign"></i> Pertanyaan anda telah dijawab oleh dr. <?php echo $value->doctor; ?></b>
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
                    <div class="pull-right"><a href="<?php echo site_url('/'); ?>"><button class="btn btn-login btn-sm" style="min-width: 7px;height:38px;font-size: 13px;background-color: #636e72;border-color: #636e72"><span class="fa fa-home"></span> Kembali ke home</button></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>