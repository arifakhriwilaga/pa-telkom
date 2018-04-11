<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-center form-account">
                <div class="box">
                    <div class="panel-form basic-form ">
                        <h2 style="text-align: left;padding-bottom:50px"><?php echo $notif->questions; ?></h2>
                        <form style="padding-left:20px;padding-right:20px">
                            <div class="row">
                                <ul class="chat">
                                    <li class="left clearfix"><span class="chat-img pull-left" style="width:65px">
                                            <img src="<?php echo base_url('assets/images/home/header/default-avatar.png'); ?>" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header" style="padding-left:20px">
                                                <strong class="primary-font"> <?php echo $user['name']; ?></strong> <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span><?php echo time_since(strtotime($notif->created_date)); ?></small>
                                            </div>
                                            <p style="padding-left:20px">
                                                <?php echo $notif->questions; ?>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix"><span class="chat-img pull-right" style="width:65px">
                                            <img src="<?php echo base_url('assets/images/home/header/default-avatar.png'); ?>" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header" style="padding-right:20px">
                                                <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo time_since(strtotime($notif->answer_date)); ?></small>
                                                <strong class="pull-right primary-font">Dr. <?php echo $notif->doctor; ?></strong>
                                            </div>
                                            <p style="padding-right:20px">
                                                <?php echo $notif->answer; ?>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </form>
                        <p class="pull-right"><a href="<?php echo site_url('notifikasi'); ?>">Kembali</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>