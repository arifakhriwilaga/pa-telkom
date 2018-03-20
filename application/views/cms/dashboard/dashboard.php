	<section class="content-header">
  <div class="container">
	<div class="row" >
    <div class="col-md-6" style="left:22%;right:25%">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-aqua-active">
          <h3 class="widget-user-username"><?php echo $user['name']; ?></h3>
          <h5 class="widget-user-desc">Admin RMPSP</h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="<?php echo($user['profile_picture'] ? base_url($user['profile_picture']) : base_url('assets/images/home/header/default-avatar.png')); ?>" alt="User Avatar">
        </div>
        <div class="box-body" style="padding-top:50px">
        	<div class="col-md-6">
        		<h3 class="box-title">Profile</h3>
          <strong><i class="fa fa-calendar margin-r-5"></i> Tanggal Lahir</strong>

          <p class="text-muted">
            <?php echo $born_date; ?>
          </p>
          <hr>
          <strong><i class="fa fa-venus-mars margin-r-5"></i> Jenis Kelamin</strong>
          <p class="text-muted">
            <?php echo($user['gender'] == "male" ? 'Laki-laki' : 'Perempuan'); ?>
          </p>

          <hr>
          
        	<strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

          <p class="text-muted">
            <?php echo $user['email']; ?>
          </p>

          <hr>
          </div>
          <div class="col-md-6">
        		<h3 class="box-title">History Login</h3>

          	<ul class="products-list product-list-in-box">

            <?php  
              foreach ($login_histories as $key => $value) {?>
                <li class="item">
                  <div class="product-img">
                      <!--  image here -->
                  </div>
                  <div class="">
                    <span href="javascript:void(0)" class="product-title"><?php echo $value['day'] ?>
                      <span class="label label-info pull-right"><?php echo $value['time'] ?></span></span>
                        <span class="product-description">
                          <?php echo $value['date'] ?>
                        </span>
                  </div>
                </li>
            <?php } ?>
          </ul>
          </div>
        </div>
      </div>
      <!-- /.widget-user -->
    </div>
  </div>
</div>
</section>
