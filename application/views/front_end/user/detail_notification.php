<section class="main-content">
    <div class="container">
        <div class="panel-form panel-notif">
            <ul class="chat">
                <li class="left clearfix">
                    <span class="chat-img pull-left">
                        <img src="<?php echo($user['profile_picture'] ? base_url($user['profile_picture']) : base_url('assets/images/home/header/default-avatar.png')); ?>" alt="User Avatar" class="img-circle" style="width: 55px;height: 55px" />
                    </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <strong class="primary-font"> <?php echo $user['name']; ?></strong> <small class="pull-right text-muted">
                                <span class="glyphicon glyphicon-time"></span><?php echo time_since(strtotime($notif->created_date)); ?></small>
                        </div>
                        <div id="question">
                            <?php echo $notif->questions; ?>
                        </div>
                    </div>
                    <div class="btn-show">
                    </div>
                </li>
                <li class="right clearfix">
                    <span class="chat-img pull-right">
                        <img src="<?php echo base_url('assets/images/home/header/default-avatar.png'); ?>" alt="User Avatar" class="img-circle" />
                    </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo time_since(strtotime($notif->answer_date)); ?></small>
                            <strong class="pull-right primary-font">Dr. <?php echo $notif->doctor; ?></strong>
                        </div>
                        <textarea rows="22" class="form-control" name="answer" readonly="true"><?php echo $notif->answer; ?></textarea>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>