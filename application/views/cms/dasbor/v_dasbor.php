<section class="content-header">
<div class="container">
	<div class="row" >
    <div class="col-md-6" style="left:22%;right:25%">
      <div class="box box-widget widget-user">

        <!-- BOX HEADER pada content dasbor yang berisi nama, admin kesdika, dan foto profile  -->
        <div class="widget-user-header bg-aqua-active">
          <h3 class="widget-user-username"><?php echo $user['nama_user']; ?></h3>
          <h5 class="widget-user-desc">Admin Kesdika</h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="<?php echo($user['foto'] ? base_url($user['foto']) : base_url('assets/images/home/header/default-avatar.png')); ?>" onerror="imgError(this);" alt="User Avatar">
        </div>
      
        <!-- BOX BODY column sebelah kiri berisi profile user dan sebelah kanan history login  -->
        <div class="box-body" style="padding-top:50px">

        <!-- column sebelah kiri profile user -->
        	<div class="col-md-6">
        		<h3 class="box-title">Profil</h3>
            <strong><i class="fa fa-calendar margin-r-5"></i> Tanggal Lahir</strong>

            <p class="text-muted">
              <?php echo $tgl_lahir; ?>
            </p>
            <hr>

            <strong><i class="fa fa-venus-mars margin-r-5"></i> Jenis Kelamin</strong>
            <p class="text-muted">
              <?php echo($user['jk_user'] == "male" ? 'Laki-laki' : 'Perempuan'); ?>
            </p>
            <hr>
            
            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
            <p class="text-muted">
              <?php echo $user['email']; ?>
            </p>
            <hr>
          </div>

          <!-- column sebelah kanan history login -->
          <div class="col-md-6">
        		<h3 class="box-title">History Login</h3>

          	<ul class="products-list product-list-in-box">

            <!-- looping untuk menampilkan history login  -->
            <?php  
              foreach ($data_history_login as $key => $value) {?>
                <li class="item">
                  <!-- div bawaan bootstrap JANGAN DI ISI BILA TIDAK DIPERLUKAN  -->
                  <div class="product-img"> </div>

                  <div>
                    <span href="javascript:void(0)" class="product-title"><?php echo $value['hari'] ?>
                      <span class="label label-info pull-right"><?php echo $value['waktu'] ?></span></span>
                        <span class="product-description">
                          <?php echo $value['tanggal'] ?>
                        </span>
                  </div>
                </li>
            <?php } ?>
            </ul>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
</section>
