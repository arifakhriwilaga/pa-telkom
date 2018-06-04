var table = $('#table-notifikasi').DataTable({
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
        "url": site_url('cms/c_notifikasi_manajemen/ambil_notifikasi'),
        "type": "POST"
    },
    "columnDefs": [
        {
            "targets": [0],
            "orderable": false,
        }
    ]
});

var id_konsul;

function tampilkanMJawaban(id) {
    id_konsul = id;
    $('#modalJawaban').modal('show');
}
function tampilkanMEditJawaban(id) {
    id_konsul = id;
    $('#modalEditJawaban').modal('show');
    $('#edit_jawaban_konsul').val($('#table-notifikasi').find('td').find('button.edit#'+id).attr('data-answer'));
}
function tutupModal() {
    $('#modalEditJawaban').modal('hide');
    $('#modalJawaban').modal('hide');
    $('#jawaban_konsul').val('');
    $('#id_konsul').val('');
}
$(document)
        .on('shown.bs.modal', '#modalJawaban', function () {
            $('#jawaban_konsul').focus();
            $('#id_konsul').val(id_konsul);
            // baru validasinya
            $('#formJawaban').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    jawaban_konsul: {
                        validators: {
                            notEmpty: {
                                message: 'Jawaban tidak boleh kosong!'
                            }
                        }
                    }
                }
            });
        })
        .on('shown.bs.modal', '#modalEditJawaban', function () {
            $('#edit_jawaban_konsul').focus();
            $('#edit_id_konsul').val(id_konsul);
            // baru validasinya
            $('#formEditJawaban').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    edit_jawaban_konsul: {
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
                    url: site_url('cms/c_notifikasi_manajemen/hapus_notifikasi'),
                    type: 'POST',
                    data: {
                        id_konsul: $(this).attr('id')
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
                    url: site_url('cms/c_notifikasi_manajemen/kirim_jawaban'),
                    type: 'POST',
                    data: {
                        id_konsul: $(this).attr('id')
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