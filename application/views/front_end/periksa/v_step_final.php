<div class="container">
    <div class="row">
        <div class="col-md-10 col-center form-account">
            <div class="panel-form basic-form form">
                <h2 style="text-align: left">Berdasarkan Diagnosa Yang Anda Alami :</h2>
                <div class="row row-final">
                    <div class="form-group text-center">
                        <div class="col-md-12 pull-right">
                            <button type="button" class="btn btn-login btn-green" data-toggle="modal" data-target="#modal1" style="min-width:330px">
                                <i class="glyphicon glyphicon-book" style="text-align: center;margin: auto;"></i> 
                                Lihat Hasil Diagnosa Penyakit
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-login btn-block btn-lg" data-toggle="modal" data-target="#modal3">
                                <i class="glyphicon glyphicon-glass"></i> 
                                Lihat Solusi & Saran
                            </button>
                        </div>
                        <div class="col-md-6 pull-right">
                            <button type="button" class="btn btn-login btn-orange btn-block btn-lg" data-toggle="modal" data-target="#modal2">
                                <i class="fa fa-spoon" style="font-size:24px"></i> 
                                Lihat Rekomendasi Makanan
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-login btn-red btn-block btn-lg" data-toggle="modal" data-target="#modal4">
                                <i class="glyphicon glyphicon-file"></i> 
                                Surat Keterangan Penyakit
                            </button>
                        </div>
                        <div class="col-md-6 pull-right">
                            <a href="<?php echo site_url('front_end/c_periksa/print_sick_letter') ?>" target="_blank" class="btn btn-login btn-purple btn-block btn-lg">
                                <i class="glyphicon glyphicon-print"></i> 
                                Cetak Surat Prediksi Penyakit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal diagnosa -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#6ab04c;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="glyphicon glyphicon-book" style="text-align: center;margin: auto;"></i> 
                    Hasil Diagnosa Penyakit Sementara
                </h4>
            </div>
            <div class="modal-body">
                <?php echo replace_newline($penyakit->diagnosa); ?>
            </div>
        </div>
    </div>
</div>

<!-- modal food recomendation -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#f0932b;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-spoon" style="font-size:24px"></i> 
                    Lihat Rekomendasi Makanan
                </h4>
            </div>
            <div class="modal-body">
                <?php echo replace_newline($penyakit->rekomendasi_makanan); ?>
            </div>
        </div>
    </div>
</div>

<!-- modal solution -->
<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#22a6b3;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="glyphicon glyphicon-glass"></i> 
                    Hasil Solusi & Saran Penyakit Yang Di Derita
                </h4>
            </div>
            <div class="modal-body">
                <?php echo replace_newline($penyakit->solusi_solusi); ?>
            </div>
        </div>
    </div>
</div>

<!-- modal disease description -->
<div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#eb4d4b;color:#fff">
                <h4 class="modal-title" id="myModalLabel">
                    <i class="glyphicon glyphicon-file"></i> 
                    Surat Hasil Keterangan Sementara
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <tr>
                                <td style="width:150px;border-top:0">Nama</td><td style="width:10px;border-top:0">:</td><td style="border-top:0"><?php echo $user['nama_user']; ?></td>
                            </tr>
                            <tr>
                                <!-- <td style="width:150px;border-top:0">Usia</td><td style="width:10px;border-top:0">:</td><td style="border-top:0">20 Tahun</td> -->
                            </tr>
                            <tr>
                                <td style="width:150px;border-top:0">Tanggal Lahir</td><td style="width:10px;border-top:0">:</td><td style="border-top:0"><?php echo $user['tgl_lahir']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr class="no-padding">

                <div class="" style="text-align:middle">
                    <?php echo replace_newline($penyakit->diagnosa); ?>
                </div>
            </div>
            <div class="modal-footer" style="text-align:center">
                <div class="col-md-7 pull-right" style="text-align:center">
                    <label style="font-size:14px;">Bandung, 10 Oktober 2017</label><br><br><br>
                    <span style="font-size:12px;"><u>Rekomendasi Kesehatan Untuk Prediksi Penyakit</u></span><br>
                    <label>Dr. Yuan Miko</label>
                </div>
                <div class="col-md-12" style="text-align:center">
                    <button type="button" data-dismiss="modal" class="btn btn-login btn-lg" style="margin-top:15%;font-size:15px;background-color:#b2bec3;border-color:#b2bec3;height:40px;min-width:60px;padding-top:9px">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>