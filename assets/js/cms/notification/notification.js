var table = $('#table-notifications').DataTable({
    "language": {
        "search": "Cari data:",
        "lengthMenu": "Lihat _MENU_ data",
        "zeroRecords": "Data tidak tersedia",
        // "infoEmpty": "Data user belum tersedia",
        // "info": "Halaman _PAGE_ dari _PAGES_ tersedia _MAX_ data",
        "paginate": {
            "first":      "Pertama",
            "last":       "Terakhir",
            "next":       "Selanjutnya",
            "previous":   "Kembali"
        },
        // "emptyTable":     "No data available in table",
        "info":           "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        "infoEmpty":      "Data 0 - 0 dari 0 data",
        "infoFiltered":   "",
        // Showing _START_ to _END_ of _TOTAL_ entries
        // "infoFiltered": "(filtered from _MAX_ total records)"
    },
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
        "url": site_url('cms/notification_management/get_notifications'),
        "type": "POST"
    },
    "columnDefs": [
        {
            "targets": [0],
            "orderable": false,
        },
        // {
        //     "targets": [6],
        //     "orderable": false,
        // },
    ]
});

var consul_id = null;

function showModal(id) {
    consul_id = id;
    $('#answerModal').modal('show');
}
function hideModal() {
    $('#answerModal').modal('hide')
    $('#answer').val('');
}
$(document).on('shown.bs.modal', '#answerModal', function() {
    $('#answer').focus();
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
                        message: 'Pertanyaan tidak boleh kosong'
                    }
                }
            }
        }
    });

    // set url
    // var url = $('#answerForm').attr('action');
    // $('#consul_id').attr('value',consul_id);

    $('#btnanswer').click(function(){
        $.ajax({
            url: site_url('cms/notification_management/post_answer'),
            type: 'POST',
            data: {
                consul_id: consul_id,
                answer: $('#answer').val()
            }
        }).done(function (data) {
            if (data.status) {
                toastr.success(data.message);
                table.ajax.reload(null, true);
                hideModal();
            } else {
                toastr.error(data.message);
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
    })


});