<div class="container">
    <div class="row">
        <div class="col-md-8 col-center form-account">
            <div class="box">
                <div class="panel-form basic-form form-consul">
                    <div class="consul-title">KONSUL DOKTER</div>
                    <h3 class="no-padding"><b>Pilih Dokter :</b></h3>
                    <form action="<?php echo site_url('front_end/c_konsultasi_dokter/lakukan_konsultasi'); ?>" method="post" id="form-consul-doctor">
                    <div class="row">
                        <?php foreach ($doctors as $key => $val) { ?>
                            <div class="col-md-6" style="height: 130px">
                                <div class="panel-form basic-form-card list-doctor">
                                    <input type="hidden" name="doctor_ids" value="<?php echo $val->id_user; ?>">
                                    <div class="col-md-3 no-padding">
                                        <img src="<?php echo base_url('assets/images/home/header/default-avatar.png'); ?>" alt="Avatar" class="avatar-basic-form">
                                    </div>
                                    <div class="col-md-8 pull-right">
                                        <div class="form-group no-padding">
                                            <b class="no-padding doctor-name"><?php echo $val->nama_user; ?></b>
                                            <span><?php echo $val->email; ?></span><br>
                                            <!-- <span><?php echo $val->no_telp; ?></span> -->
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php 
                            if(!count($doctors)){ ?>
                                <div class="col-md-12" style="height: 130px">
                                    <div class="panel-form basic-form-card list-doctor text-center">
                                        Dokter belum tersedia, silahkan hubungi customer service kami
                                    </div>
                                </div>
                            <?php 
                            }
                        ?>
                        <div class="col-md-12 form-group">
                            <input type="hidden" name="id_dokter" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <textarea name="pertanyaan_konsul" id="pertanyaan_konsul" class="form-control" placeholder="Pertanyaan" rows="5"></textarea>
                                <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
                            </div>
                            <div class="no-padding text-center">
                                <button type="submit" class="btn btn-consul btn-login btn-lg"> Kirim </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>