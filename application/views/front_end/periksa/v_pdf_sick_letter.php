<div class="row">
  <div class="col-md-12">
      <div class="col-md-3" style="">
      <img src="<?php echo base_url('assets/images/home/header/logo.png'); ?>" alt="Logo" style="width:180px;height: 60px;margin-left:15px"/>
          <span style="font-size:16px;color:#e67e22"><strong style="position: absolute;top: 30px;right:5px;font-family: Helvetica;">Rekomendasi Kesehatan Untuk Prediksi Penyakit</strong></span>
      </div>
  </div>
  <div class="col-md-12" style="padding-top: 50px">
  <div class="row">
  <!-- <h3 style="font-size:17px;font-weight: 500;line-height: 1.1;color: inherit;font-family: Helvetica;"> Surat Prediksi Penyakit :</h3> -->
  </div>
  <div class="row" style="padding-top: 5px">
      <table style="font-family: Helvetica;">
          <tr>
              <td style="width:150px;border-top:0"><strong>Nama</strong></td><td style="width:10px;border-top:0"><strong>:</strong></td><td style="border-top:0"><strong><?php echo($users['nama_user']); ?></strong></td>
          </tr>
          <tr>
              <td style="width:150px;border-top:0"><strong>Tanggal Lahir</strong></td><td style="width:10px;border-top:0"><strong>:</strong></td><td style="border-top:0"><strong><?php echo($users['tgl_lahir']); ?></strong></td>
          </tr>
      </table>
  </div>
  <div class="row">
  <hr class="no-padding">
              
  <!-- <div class=""> -->
  <div style="text-align:justify"> Kemungkinan Hasil
  <?php echo($users['diagnosa']); ?>
  <!-- </div> -->
  <div class="col-md-7 pull-right" style="text-align:center;padding-top: 50px">
    <label style="font-size:14px;"><strong>Bandung, <?php echo($users['hari_ini']); ?></strong></label><br><br><br><br><br>
    <!-- <span style="font-size:12px;"><u>Rekomendasi Kesehatan Untuk Prediksi Penyakit</u></span><br> -->
    <label><?php echo 'Dr.'. $users['dokter'] ?></label>
  </div>
  </div>

  <div class="row">
        <div class="col-md-12">
        <div class="col-md-3"> 
            <span style="font-size:11px;color:#000000;font-family: Helvetica
            ;position: absolute;top: 820px;left:9px"><span style="color:#e67e22">*</span> Hasil Diagnosa yang didapatkan hanya sebatas prediksi, anda harus tetap konsultasikan penyakit anda ke dokter</span>
        </div>  
        </div>
    </div>
</div>
</div>
