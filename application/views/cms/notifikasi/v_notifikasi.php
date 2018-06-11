<section class="content-header">
    <h1>Kelola Notifikasi</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-body">
                    <table id="table-notifikasi" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10px" class="text-center">ID</th>
                                <th width="150px" class="text-center">NAMA</th>
                                <th width="150px" class="text-center">NAMA PENGGUNA</th>
                                <th width="200px" class="text-center">PERTANYAAN</th>
                                <th width="200px" class="text-center">JAWABAN</th>
                                <th width="70px" class="text-center">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal answer -->
<div class="modal fade" id="modalJawaban" tabindex="-1" role="dialog" aria-labelledby="modalJawaban">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="tutupModal()" aria-label="Close"><span aria-hidden="true" style="color:#fff">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-share"></i> Form Jawaban</h4>
            </div>
            <div class="modal-body">
                <form id="formJawaban" action="<?php echo site_url('cms/c_notifikasi_manajemen/buat_jawaban') ?>" method="post"> 
                    <input type="hidden" id="id_konsul" name="id_konsul" value="">
                    <div class="form-group">
                        <textarea class="form-control" name="jawaban_konsul" id="jawaban_konsul" rows="22" placeholder="Ketik jawaban disini..." style="resize: none;"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button id="btnanswer" type="submit" class="btn btn-default btn-md pull-right">Jawab</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>

<!-- modal answer -->
<div class="modal fade" id="modalEditJawaban" tabindex="-1" role="dialog" aria-labelledby="modalEditJawaban">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="hideModal()" aria-label="Close"><span aria-hidden="true" style="color:#fff">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-share"></i> Form Jawaban</h4>
            </div>
            <div class="modal-body">
                <form id="formEditJawaban" action="<?php echo site_url('cms/c_notifikasi_manajemen/rubah_jawaban') ?>" method="post"> 
                    <input type="hidden" id="edit_id_konsul" name="edit_id_konsul" value="">
                    <div class="form-group">
                        <textarea class="form-control" name="edit_jawaban_konsul" id="edit_jawaban_konsul" rows="22" placeholder="Ketik jawaban disini..." style="resize: none;"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button id="btnanswer" type="submit" class="btn btn-default btn-md pull-right">Jawab</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>