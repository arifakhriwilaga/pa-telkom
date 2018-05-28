<a href="index2.html" class="logo">
    <span class="logo-mini"><img src="<?php echo base_url('assets/images/cms/logo.png'); ?>" class="logo-header" width="70%"></span>
    <span class="logo-lg"> <img src="<?php echo base_url('assets/images/cms/logo.png'); ?>" class="logo-header" width="18%"> KESDIKA</span>
</a>
<nav class="navbar navbar-static-top">
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo($user['profile_picture'] ? base_url($user['profile_picture']) : base_url('assets/images/home/header/default-avatar.png')); ?>" onerror="imgError(this);" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php echo $user['name']; ?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">
                        <img src="<?php echo($user['profile_picture'] ? base_url($user['profile_picture']) : base_url('assets/images/home/header/default-avatar.png')); ?>" onerror="imgError(this);" class="img-circle" alt="User Image">
                        <p> <?php echo $user['name']; ?> </p>
                    </li>
                    <li class="user-footer">
                        <div class="pull-right">
                            <a href="<?php echo site_url('c_autentikasi/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>