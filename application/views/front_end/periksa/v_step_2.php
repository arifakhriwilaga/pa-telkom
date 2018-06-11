<div class="container">
    <div class="row">
        <div class="col-md-10 col-center form-account">
            <div class="panel-form basic-form form">
             <h2 style="text-align: left;color:#e67e22"><?php echo $gejala->gejala; ?></h2><hr>
                <form id="form-periksa-2" action="<?php echo site_url('front_end/c_periksa/pengecekan_pertanyaan'); ?>" method="post" style="padding-left:50px;padding-right:50px;">
                    <input type="hidden" name="id_gejala" value="<?php echo $gejala->id_gejala; ?>">
                    <input type="hidden" name="id_tahap_periksa" value="<?php echo $tahap_pemeriksaan->id_pemeriksaan; ?>">
                    <input type="hidden" name="penyakit_benar" value="<?php echo $tahap_pemeriksaan->penyakit_benar; ?>">
                    <input type="hidden" name="penyakit_salah" value="<?php echo $tahap_pemeriksaan->penyakit_salah; ?>">
                    <div class="form-group row">
                        <label class="col-md-9"><?php echo $tahap_pemeriksaan->pertanyaan; ?></label>
                        <label class="col-md-3">
                            <label class="col-md-6 pointer">
                                <input type="radio" name="jawaban" value="true" class="col-md-2 pointer" style="margin-right:3px">Ya
                            </label>
                            <label class="col-md-6 pointer">
                                <input type="radio" name="jawaban" value="false" class="col-md-2" style="margin-right:3px"> Tidak
                            </label>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>