var table;
var id_konsultasi;
$(document)
        .ready(function () {
            id_konsultasi = $('table#table-detail-konsultasi').attr('data-id');
            table = $('#table-detail-konsultasi').DataTable({
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
                    "infoFiltered": "",
                },
                "processing": true,
                "serverSide": true,
                "searching": false,
                "ordering": false,
                // "order": [],
                "ajax": {
                    "url": site_url('cms/c_konsultasi_manajemen/ambil_detail_konsultasi/'+id_konsultasi),
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
                    },
                ]
            });
        })