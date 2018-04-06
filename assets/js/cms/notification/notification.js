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
        "url": site_url('cms/notification_management/get_notifications'),
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
function hideModal() {
    $('#answerModal').modal('hide');
    $('#answer').val('');
}
$(document).on('shown.bs.modal', '#answerModal', function () {
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
});