
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-center">
                <div class="box">
                    <div class="panel-form basic-form form">
                        <h2>Edit Profile</h2>
                        <form action="<?php echo site_url('front_end/profile/update_profile/'.$user['user_id']); ?>" method="POST" enctype="multipart/form-data" id="edit-profile" class="form-horizontal" style="padding-left:15px;padding-right:15px">
                            <div class="form-group">
                                <div class="ava-image">
                                    <span>
                                        <img id="profile-image" class="placeholder-img" src="<?php echo($user['profile_picture'] ? base_url($user['profile_picture']) : base_url('assets/images/home/header/default-avatar.png')); ?>" alt="<?php echo $user['name']; ?>" />
                                    </span>

                                    <label for="input-profile-picture" class="edit-photo">
                                        <i class="fa fa-pencil" style="padding-left:25%"></i>
                                    </label>
                                    <input type="file" name="profile_picture" accept="image/*" id="input-profile-picture">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="level_user" value="<?php echo $user['level_user']; ?>" class="form-control">
                                <input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control" placeholder="Nama Lengkap" required="" autocomplete="false">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" value="<?php echo $user['email']; ?>" class="form-control" placeholder="Email" required="" autocomplete="false">
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" value="<?php echo $user['username']; ?>" class="form-control" placeholder="Nama Pengguna" readonly="">
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label no-padding" style="text-align:left">Jenis Kelamin </label>
                                <div class="col-xs-9 no-padding">
                                    <div class="radio no-padding">
                                        <label><input type="radio" name="gender" value="male" <?php echo $user['gender'] == 'male' ? 'checked' : ''; ?>>Laki-laki</label>
                                        <label><input type="radio" name="gender" value="female" <?php echo $user['gender'] == 'female' ? 'checked' : ''; ?>>Perempuan</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input  type="text" name="born_date" id="born_date" data-born_date="<?php echo date("d/m/Y", strtotime($user['born_date'])); ?>" class="form-control" placeholder="Tanggal Lahir" required="" autocomplete="false">
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Ubah kata sandi">
                            </div>

                            <div class="form-group">
                                <input type="password" name="confirm_password" class="form-control" placeholder="Ulang Kata sandi">
                            </div>
                            <div class="row">
                            <button type="submit" name="submitButton" class="btn btn-block btn-login btn-lg">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>