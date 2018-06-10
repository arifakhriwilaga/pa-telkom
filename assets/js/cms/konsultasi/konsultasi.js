var table;
$(document)
        .ready(function () {
            table = $('#table-konsultasi').DataTable({
                "language": {
                    "infoFiltered": "",
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
                },
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": site_url('cms/c_konsultasi_manajemen/ambil_konsultasi'),
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
                    url: site_url('cms/c_akun_manajemen/hapus_akun'),
                    type: 'POST',
                    data: {
                        user_id: $(this).attr('id')
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