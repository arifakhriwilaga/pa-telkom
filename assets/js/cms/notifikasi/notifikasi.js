var table = $('#table-notifications').DataTable({
    "language": {
        "search": "Cari data:",
        "lengthMenu": "Lihat _MENU_ data",
        "zeroRecords": "Data tidak tersedia",
        "paginate": {
            "first": "Pertama",
            "last": "Terakhir",
            "next": "Selanjutnya",
            "previous": "Kembali"
        },
        "info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        "infoEmpty": "Data 0 - 0 dari 0 data",
        "infoFiltered": "",
    },
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
        "url": site_url('cms/c_notifikasi_manajemen/get_notifications'),
        "type": "POST"
    },
    "columnDefs": [
        {
            "targets": [0],
            "orderable": false,
        }
    ]
});

var consul_id;

function showModal(id) {
    consul_id = id;
    $('#answerModal').modal('show');
}
function editModal(id) {
    consul_id = id;
    $('#editAnswerModal').modal('show');
    $('#edit_answer').val($('#table-notifications').find('td').find('button.edit#'+id).attr('data-answer'));
}
function hideModal() {
    $('#answerModal').modal('hide');
    $('#answer').val('');
    $('#consul_id').val('');
}
$(document)
        .on('shown.bs.modal', '#answerModal', function () {
            $('#answer').focus();
            $('#consul_id').val(consul_id);
            // baru validasinya
            $('#answerForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    answer: {
                        validators: {
                            notEmpty: {
                                message: 'Jawaban tidak boleh kosong!'
                            }
                        }
                    }
                }
            });
        })
        .on('shown.bs.modal', '#editAnswerModal', function () {
            $('#edit_answer').focus();
            $('#edit_consul_id').val(consul_id);
            // baru validasinya
            $('#editAnswerForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    edit_answer: {
                        validators: {
                            notEmpty: {
                                message: 'Jawaban tidak boleh kosong!'
                            }
                        }
                    }
                }
            });
        })
        .on('click', '.delete-acc', function () {
            if (confirm('Anda yakin ingin menghapus pertanyaan ' + $(this).data('name') + '?')) {
                $.ajax({
                    url: site_url('cms/notification_management/delete_notification'),
                    type: 'POST',
                    data: {
                        consul_id: $(this).attr('id')
                    }
                }).done(function (data) {
                    if (data.status) {
                        toastr.success(data.message,'',config.toastr);
                        table.ajax.reload(null, false);
                    } else {
                        toastr.error(data.message,'',config.toastr);
                    }
                }).fail(function (xhr, status, error) {
                    var msg = '';
                    if (xhr.status === 404) {
                        msg = 'Requested page not found.';
                    } else if (xhr.status === 500) {
                        msg = 'Internal Server Error.';
                    } else if (error === 'parsererror') {
                        msg = 'Requested failed.';
                    } else if (error === 'timeout') {
                        msg = 'Time out error.';
                    } else if (error === 'abort') {
                        msg = 'Request aborted.';
                    }
                    toastr.error(msg);
                });
            }
        })
        .on('click', '.btn-send-answer', function () {
            if (confirm('Anda yakin ingin mengirim jawaban kepada ' + $(this).data('name') + '?')) {
                $.ajax({
                    url: site_url('cms/notification_management/send_answer'),
                    type: 'POST',
                    data: {
                        consul_id: $(this).attr('id')
                    }
                }).done(function (data) {
                    if (data.status) {
                        toastr.success(data.message,'',config.toastr);
                        table.ajax.reload(null, false);
                    } else {
                        toastr.error(data.message,'',config.toastr);
                    }
                }).fail(function (xhr, status, error) {
                    var msg = '';
                    if (xhr.status === 404) {
                        msg = 'Requested page not found.';
                    } else if (xhr.status === 500) {
                        msg = 'Internal Server Error.';
                    } else if (error === 'parsererror') {
                        msg = 'Requested failed.';
                    } else if (error === 'timeout') {
                        msg = 'Time out error.';
                    } else if (error === 'abort') {
                        msg = 'Request aborted.';
                    }
                    toastr.error(msg);
                });
            }
        });