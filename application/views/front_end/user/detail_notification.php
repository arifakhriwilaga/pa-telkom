<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-center form-account">
                <div class="box">
                    <div class="panel-form basic-form ">
                        <!-- <div class="col-md-12">
                        <div class="col-md-12">
                        <img src="<?php echo($user['profile_picture'] ? base_url($user['profile_picture']) : base_url('assets/images/home/header/default-avatar.png')); ?>" alt="User Avatar" class="img-circle" style="width: 55px;height: 55px" /><small class="pull-right text-muted" style="position: absolute;right: 5px;bottom:0">
                        <span class="glyphicon glyphicon-time"></span><?php echo time_since(strtotime($notif->created_date)); ?></small>
                        </div>
                        <div class="col-md-12">
                        <h3 style="text-align: left;padding-bottom:50px;color:#565656"><?php echo $notif->questions; ?></h3>
                        </div>
                        </div> -->
                        <form style="padding-left:20px;padding-right:20px">
                            <div class="row">
                                <ul class="chat">
                                    <li class="left clearfix"><span class="chat-img pull-left" style="width:55px">
                                            <img src="<?php echo($user['profile_picture'] ? base_url($user['profile_picture']) : base_url('assets/images/home/header/default-avatar.png')); ?>" alt="User Avatar" class="img-circle" style="width: 55px;height: 55px" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"> <?php echo $user['name']; ?></strong> <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span><?php echo time_since(strtotime($notif->created_date)); ?></small>
                                            </div>
                                            <div class="col-md-12" style="padding-top:10px">
                                            <h3 style="text-align: left;padding-bottom:50px;color:#565656;margin-top:0"><?php echo $notif->questions; ?></h3>
                                            <!-- <textarea rows="7" class="form-control" name="answer" readonly="true"><?php echo trim($notif->questions); ?></textarea> -->
                                            <!-- </div> -->
                                        </div>
                                    </li>
                                    <li class="right clearfix"><span class="chat-img pull-right" style="width:55px">
                                            <img src="<?php echo base_url('assets/images/home/header/default-avatar.png'); ?>" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo time_since(strtotime($notif->answer_date)); ?></small>
                                                <strong class="pull-right primary-font">Dr. <?php echo $notif->doctor; ?></strong>
                                            </div>
                                            <div class="col-md-12" style="padding-top:10px">
                                            <textarea rows="22" class="form-control" name="answer" readonly="true"><?php echo $notif->answer; ?></textarea>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </form>
                        <div class="pull-right"><a href="<?php echo site_url('notifikasi'); ?>"><button class="btn btn-login btn-sm" style="min-width: 7px;height:38px;font-size: 13px;background-color: #636e72;border-color: #636e72"><span class="fa  fa-arrow-circle-left"></span> Kembali</button></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>