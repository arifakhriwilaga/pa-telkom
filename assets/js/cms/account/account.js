var table;
$(document)
.ready(function () {
    table = $('#table-accounts').DataTable({
        "language": {
            "infoFiltered":   "",
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
            // "infoFiltered":   "(filtered from _MAX_ total entries)",
            // Showing _START_ to _END_ of _TOTAL_ entries
            // "infoFiltered": "(filtered from _MAX_ total records)"
        },
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": site_url('cms/account_management/get_accounts'),
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [0],
                "orderable": false,
            },
            {
                "targets": [6],
                "orderable": false,
            },
        ]
    });
})
.on('click', '.delete-acc', function () {
    if (confirm('Anda yakin ingin menghapus akun ' + $(this).data('name') + '?')) {
        $.ajax({
            url: site_url('cms/account_management/delete_account'),
            type: 'POST',
            data: {
                user_id: $(this).attr('id')
            }
        }).done(function (data) {
            if (data.status) {
                toastr.success(data.message);
                table.ajax.reload(null, false);
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
    }
});