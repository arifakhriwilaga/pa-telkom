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
                        <h2 class="text-center">REGISTRASI AKUN</h2><br>
                        <div class="form-group">
                            <label class="col-xs-3 control-label no-padding" style="text-align:left">Registrasi Sebagai </label>
                            <div class="col-xs-9 no-padding">
                            <div class="radio no-padding">
                                <span style="margin-left:35px"><input type="radio" name="type" value="u" checked> User</span>
                                <span style="margin-left:35px"><input type="radio" name="type" value="d"> Dokter</span>
                            </div>
                            </div>
                        </div>
                        <br>
                        <div id="section-form">
                            <form action="<?php echo site_url('c_autentikasi/lakukan_registrasi'); ?>" method="POST" id="registrasi" enctype="multipart/form-data" class="form-horizontal" style="padding-left:15px;padding-right:15px">
                                <div class="form-group">
                                    <input type="hidden" name="level_user" value="user" id="level_user" class="form-control">
                                    <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Nama Lengkap" required="" autocomplete="false">
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
                                            <label><input type="radio" name="jk_user" value="male">Laki-laki</label>
                                            <label><input type="radio" name="jk_user" value="female">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input  type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required="" autocomplete="false">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Kata sandi" required="" maxlength="15">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" placeholder="Ulang Kata sandi" required="" maxlength="15">
                                </div>
                                <div id="form-dokter" class="hide">
                                    <hr>
                                    <div class="form-group">
                                        <label>
                                            <span style="font-size: 24px;color:#e67e22">*</span>
                                            <strong>Input NIP dan Upload ijazah dokter anda untuk diverifikasi admin.</strong>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="berkas" accept="image/*" id="berkas" required="" disabled="">                            
                                    </div>
                                    <div class="form-group">
                                        <input  type="text" name="nip" id="nip" class="form-control" placeholder="NIP" autocomplete="false" required="" disabled="">
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" name="submitButton" class="btn btn-block btn-login btn-lg">Daftar</button>
                                    <br>
                                    <p>Sudah punya akun?  <a href="<?php echo site_url('masuk-akun'); ?>">masuk disini</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>