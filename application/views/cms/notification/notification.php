<section class="content-header">
    <h1>Kelola Notifikasi</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-body">
                    <table id="table-notifications" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10px" class="text-center">ID</th>
                                <th width="150px" class="text-center">Name</th>
                                <th width="150px" class="text-center">Userame</th>
                                <th width="200px" class="text-center">Questions</th>
                                <th width="200px" class="text-center">Answer</th>
                                <th width="50px" class="text-center">Opsi</th>
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
<div class="modal fade" id="answerModal" tabindex="-1" role="dialog" aria-labelledby="answerModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="hideModal()" aria-label="Close"><span aria-hidden="true" style="color:#fff">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-share"></i> Form Jawaban</h4>
            </div>
            <div class="modal-body">
                <form id="answerForm" action="<?php echo site_url('cms/notification_management/post_answer') ?>" method="post"> 
                    <input type="hidden" id="consul_id" name="consul_id" value="">
                    <div class="form-group">
                        <textarea class="form-control" name="answer" id="answer" rows="22" placeholder="Ketik jawaban disini..." style="resize: none;"></textarea>
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