    <div class="container">
        <div class="row">
            <div class="col-md-7" style="padding-top:100px;">
                <img src="<?php echo base_url('assets/images/home/login_banner.png'); ?>" style="width:470px;height:300px;margin-left:100px" alt="Logo" />
            </div>
            <div class="col-md-4 form-account">
                <div class="box">
                    <div class="panel-form basic-form ">
                        <h2 class="text-center">MASUK AKUN</h2>
                        <form action="<?php echo site_url('c_autentikasi/lakukan_login'); ?>" method="POST" id="login">
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nama Pengguna" autocomplete="false">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Kata Sandi">
                            </div>
                            <div class="form-group">
                                <div class="col-md-5" style="padding:0">
                                    <div class="checkbox checkbox-primary"> <input id="remember_me" type="checkbox" name="remember_me" class=""> <label for="remember_me" style="padding:0"> Ingat Saya </label> </div> 
                                </div>
                                <div class="col-md-7" style="padding:8px 0 0 0">
                                    <a href="<?php echo site_url('lupa-kata-sandi'); ?>" class="pull-right">Lupa kata sandi?</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-login btn-lg">Masuk</button><br>
                        </form>
                        <p>Belum punya akun?  <a href="<?php echo site_url('registrasi'); ?>">daftar disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>