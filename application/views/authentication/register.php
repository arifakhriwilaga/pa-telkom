    <div class="container">
        <div class="row">
            <div class="col-md-6" style="text-align:left">
                <img src="<?php echo base_url('assets/images/home/register-left-banner.png'); ?>" style="width:250px;height:450px;margin-top:100px" alt="Logo" />
            </div>
            <div class="col-md-6" style="text-align:right">
                <img src="<?php echo base_url('assets/images/home/register-right-banner.png'); ?>" style="width:250px;height:450px;margin-top:100px" alt="Logo" />
            </div>
            <div class="col-md-5 col-center form-account" style="position:absolute;left:25%;right:25%;">
                <div class="box">
                    <div class="panel-form basic-form form" style="margin:15px 0">
                        <h2>REGISTRASI</h2>
                        <form action="<?php echo site_url('authentication/do_register'); ?>" method="POST" id="register" class="form-horizontal" style="padding-left:15px;padding-right:15px">
                            <div class="form-group">
                                <input type="hidden" name="level_user" value="user" id="level_user" class="form-control">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap" required="" autocomplete="false">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" required="" autocomplete="false">
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nama Pengguna" required="" autocomplete="false" maxlength="30">
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 control-label no-padding" style="text-align:left">Jenis Kelamin </label>
                                <div class="col-xs-9 no-padding">
                                <div class="radio no-padding">
                                    <label><input type="radio" name="gender" value="male">Laki-laki</label>
                                    <label><input type="radio" name="gender" value="female">Perempuan</label>
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input  type="text" name="born_date" id="born_date" class="form-control" placeholder="Tanggal Lahir" required="" autocomplete="false">
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Kata sandi" required="" maxlength="15">
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Ulang Kata sandi" required="" maxlength="15">
                            </div>
                            <div class="row">
                            <button type="submit" name="submitButton" class="btn btn-block btn-login btn-lg">Daftar</button><br>
                            <p>Sudah punya akun?  <a href="<?php echo site_url('login'); ?>">masuk disini</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>