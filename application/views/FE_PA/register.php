<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">


        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/navmenu/styles.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/portfolio.jquery.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/fonticons.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/style.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/fonts/stylesheet.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.css">
        <!--        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap-theme.min.css">-->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/responsive.css" />

        <script src="<?php echo base_url() ?>/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body data-spy="scroll" data-target=".navbar-collapse">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!--Home page style-->
        <header>

            <div class="container">
                <div class="nav-top clearfix">
                    <div class="logo">
                        <div class="col-md-3" style="padding-right:0;padding-left:0">
                        <a  href="" class="navbar-brand"><img src="<?php echo base_url() ?>/assets/images/logo.png" alt="Logo" /></a>
                        </div>
                        <div class="col-md-8" style="padding-top:2%;padding-left:3px;padding-right:0">
                            <span style="font-size:18px;color:#e67e22"><strong>Rekomendasi Makanan Pada Solusi Penyakit</strong></span>
                        </div>
                    </div>

                    <div class="head_top_social pull-right">
                        <span class="head-customer"><a href="login.html">Login</a> | <a href="#">Register</a> </span>
                        <!-- <ul class="list-inline"> -->
                            <!-- <li>Login</li> -->
                            <!-- <li><a href="">Registrasi</a></li> -->
                            <!-- <li class="top_socail">
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-pinterest-p"></i></a>
                            </li> -->

                        <!-- </ul> -->
                    </div>

                    <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
                    </button>

                </div>
            </div>

            <div class="main-nav navbar-collapse collapse">
                <div class="container">
                    <div class="minilogo">
                        <a  href="" class="navbar-brand"><img src="<?php echo base_url() ?>/assets/images/logo2.png" alt="Logo" /></a>
                    </div>
                    <ul class="nav nav-justified">
                        <li><a href="index.html">HOME</a></li>
                        <li><a href="#service">PERIKSA</a></li>
                        <li><a href="#lessons">KONSUL DOKTER</a></li>
                        <li><a href="#portfolio">INFO SEHAT</a></li>
                        <!-- <li><a href="#blog">BLOG</a></li> -->
                        <!-- <li><a href="#contact">CONTACT</a></li> -->
                    </ul>
                </div>
            </div>
        </header>



        <!--  -->



        <!-- <div style="display:block;"> -->

        <section class="main-content">
         <div class="container">
            <div class="row">
               <div class="col-md-5 col-center form-account">
                <div class="box">
                  <div class="panel-form basic-form ">
                     <h2>REGISTRASI</h2>
                        <form>
                        <div class="form-group">
                            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Nama Pengguna">
                        </div>

                        <div class="form-group">
                           <label for="gender">Jenis Kelamin</label> 
                            <input type="radio" name="gender" id="gender" value="male">Laki-laki
                            <input type="radio" name="gender" id="gender" value="female">Perempuan
                        </div>

                        <div class="form-group">
                            <input type="text" name="born_date" id="born_date" class="form-control" placeholder="Tanggal Lahir">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Kata sandi">
                        </div>

                        <div class="form-group">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Ulang Kata sandi">
                        </div>
                        <button type="button" class="btn btn-block btn-primary btn-lg">Daftar</button><br>
                        </form>
                        <p>Sudah punya akun?  <a href="#">masuk disini</a></p>
                     </div>
                  </div>
                </div>
               </div>
            </div>
         </div>
        </section>

        <script src="<?php echo base_url() ?>/assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/js/bootstrap.js"></script>

        <script src="<?php echo base_url() ?>/assets/js/jquery.easypiechart.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/js/portfolio.jquery.js"></script>
        <script src="<?php echo base_url() ?>/assets/js/jquery.mixitup.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/js/jquery.easing.1.3.js"></script>
        <script src="<?php echo base_url() ?>/assets/js/jquery.slicknav.min.js"></script>
        <!--This is link only for gmaps-->
        <script src="http://maps.google.com/maps/api/js"></script>
        <script src="<?php echo base_url() ?>/assets/js/gmaps.min.js"></script>
        <script>
            // var map = new GMaps({
            //     el: '.ourmaps',
            //     scrollwheel: false,
            //     lat: -12.043333,
            //     lng: -77.028333
            // });
            // $('.carousel').carousel({
            //     pause : true
            // })
        </script>



        <script src="<?php echo base_url() ?>/assets/js/plugins.js"></script>
        <script src="<?php echo base_url() ?>/assets/js/main.js"></script>

    </body>
</html>
