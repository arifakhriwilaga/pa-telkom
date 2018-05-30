    <div class="container">
        <div class="row">
            <div class="col-md-5 col-center form-account">
                <div class="box">
                    <div class="panel-form basic-form">
                        <h2 class="text-center">Lupa Password</h2>
                        <form action="<?php echo site_url('c_autentikasi/lakukan_reset_kata_sandi'); ?>" method="post" id="lupa-kata-sandi">
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nama Pengguna" autocomplete="false">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Kata sandi baru">
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Ulang Kata sandi" required="" maxlength="15">
                            </div>
                            <button type="submit" class="btn btn-block btn-login btn-lg">Process</button><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>