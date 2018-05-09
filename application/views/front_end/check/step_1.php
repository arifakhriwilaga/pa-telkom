<div class="container">
    <div class="row">
        <div class="col-md-10 col-center form-account">
            <div class="panel-form basic-form form">
             <h2 style="text-align: left;color:#e67e22">Selamat Datang di Pemeriksaan Gejala Kesehatan Online</h2>
                <div class="col-md-1" style="padding:0;width: 0"><span style="font-size: 24px;color:#e67e22">*</span></div>
                <div class="col-md-11">
                    <h4>Informasi yang Anda peroleh dari hasil fitur pemeriksaan gejala ini tidak dapat digunakan sebagai pengganti rekomendasi, diagnosis dan/atau perawatan yang disarankan oleh ahli medis profesional.<br> Jika Anda mengalami keadaan darurat, segera hubungi dokter.</h4>
                </div>
                <div class="col-md-12" style="padding-bottom: 30px"><hr>
                    <form id="form-check" action="<?php echo site_url('periksa/step-2'); ?>" method="post" style="padding-left:25px;padding-right:25px;padding-top: 10px;">
                        <div class="col-md-5" style="padding-top: 45px;">
                            <div class="form-group">
                                <h4 class="margin-0" style="color:#e67e22">Kenali Gejala Penyakit Anda</h4>
                                <p class="margin-0">Merasa mengalami gangguan kesehatan?</p>
                                <p class="margin-0">Cari tahu penyebab dan solusinya sekarang juga!</p>
                            </div>
                            <div class="form-group">
                                <select id="check-search" name="symptom_id" onchange="checkChange()" style="width: 300px;max-height: 300px">
                                    <option>Cari gejala...</option>
                                    <?php
                                        foreach ($symptoms as $key => $value) {
                                            echo '<option value="'. $value->id .'">'. $value->symptom .'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="<?php echo base_url('assets/images/home/check.png'); ?>" style="width:350px;height:260px;" alt="Logo" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>