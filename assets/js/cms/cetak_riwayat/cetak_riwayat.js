var table = $("#tabel_cetak_riwayat").DataTable({
  "language": {
    "search": "Cari data:",
    "lengthMenu": "Lihat _MENU_ data",
    "zeroRecords": "Data tidak tersedia",
    "infoFiltered":   "",
    "paginate": {
        "first":      "Pertama",
        "last":       "Terakhir",
        "next":       "Selanjutnya",
        "previous":   "Kembali"
    },
    "info":           "Menampilkan _START_ - _END_ dari _TOTAL_ data",
    "infoEmpty":      "Data 0 - 0 dari 0 data",
    },
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
        "url": site_url('cms/c_cetak_riwayat/ambil_cetak_riwayat'),
        "type": "POST"
    },
    "columnDefs": [
        {
            "targets": [0],
            "orderable": false,
        },
        {
            "targets": [4],
            "orderable": false,
        }
    ]
});
$(document)
.on('click', '.hapus-cetak-riwayat', function () {
    if (confirm('Anda yakin ingin menghapus riwayat dari ' + $(this).data('name') + '?')) {
        $.ajax({
            url: site_url('cms/c_cetak_riwayat/hapus_cetak_riwayat'),
            type: 'POST',
            data: {
                id: $(this).attr('id')
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